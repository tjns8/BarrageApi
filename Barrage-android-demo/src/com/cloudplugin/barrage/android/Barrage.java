package com.cloudplugin.barrage.android;

import java.io.IOException;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.protocol.HTTP;
import org.apache.http.util.EntityUtils;
import android.annotation.SuppressLint;
import android.content.Context;
import android.os.Handler;
import android.os.Handler.Callback;
import android.os.Message;
import android.util.AttributeSet;
import android.util.Log;
import android.view.animation.Animation;
import android.view.animation.Animation.AnimationListener;
import android.view.animation.TranslateAnimation;
import android.widget.AbsoluteLayout;
import android.widget.TextView;

/**
 * 视频专用弹幕插件
 * 
 * @author cat 在调用功能前，必须先通过{@link #register(String)}注册
 *         <p>
 *         显示前需要通过{{@link #setSource(String)}确定资源
 *         <p>
 *         {@link #start()},{@link #pause()},{@link #stop()}与视频播放控制相关
 */
public class Barrage extends AbsoluteLayout implements Callback {

	public Barrage(Context context) {
		super(context);
		// TODO Auto-generated constructor stub
		init(context);
	}

	public Barrage(Context context, AttributeSet attrs) {
		super(context, attrs);
		// TODO Auto-generated constructor stub
		init(context);
	}

	public Barrage(Context context, AttributeSet attrs, int defStyleAttr) {
		super(context, attrs, defStyleAttr);
		// TODO Auto-generated constructor stub
		init(context);
	}

	private Barrage barrage;
	private Context context;
	private int barrageWidth;
	private int barrageHeight;

	private boolean isStop = false;
	private boolean isPause = false;
	private boolean isStart = false;
	private Handler handler = null;

	@Override
	public boolean handleMessage(Message arg0) {
		// TODO Auto-generated method stub
		final TextView child = new TextView(context);
		String text = (String) arg0.obj;
		int width = barrageWidth;
		int height = (int) (barrageHeight * Math.random());
		// child.setTextColor((int) (Math.random() * Integer.MAX_VALUE));
		child.setTextSize((int) (Math.random() * 5 + 10));
		child.setText(text);
		TranslateAnimation animation = new TranslateAnimation(width, -width, height, height);
		animation.setAnimationListener(new AnimationListener() {

			@Override
			public void onAnimationStart(Animation arg0) {
				// TODO Auto-generated method stub

			}

			@Override
			public void onAnimationRepeat(Animation arg0) {
				// TODO Auto-generated method stub
			}

			@Override
			public void onAnimationEnd(Animation arg0) {
				// TODO Auto-generated method stub
				barrage.removeView(child);
			}
		});
		animation.setDuration((int) (Math.random() * 2000 + 3000));
		child.startAnimation(animation);
		barrage.addView(child, width, height);
		Log.i("text", text);
		return false;
	}

	/**
	 * 初始化
	 * 
	 * @param context
	 */
	private void init(Context context) {
		barrage = this;
		this.context = context;
		handler = new Handler(this);
	}

	@Override
	protected void onMeasure(int widthMeasureSpec, int heightMeasureSpec) {
		// TODO Auto-generated method stub
		super.onMeasure(widthMeasureSpec, heightMeasureSpec);
		barrageWidth = this.getMeasuredWidth();
		barrageHeight = this.getMeasuredHeight();
		Log.i("width", "" + barrageWidth);
		Log.i("height", "" + barrageHeight);
	}

	/**
	 * 启动
	 */
	public void start() {
		isPause = false;
		if (isStart)
			return;
		isStop = false;
		new Thread() {
			public void run() {
				isStart = true;
				if (arrayList == null)
					return;
				long oldtime=0;
				for (int i=0;i<arrayList.size();i++) {
					BarrageView view1=arrayList.get(i);
					Message msg=new Message();
					msg.obj=view1.text;
					long time=view1.start;
					try {
						sleep(time-oldtime);
					} catch (InterruptedException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
					oldtime=time;
					handler.sendMessage(msg);
				}

				isStart = false;
			};
		}.start();
		starttime = System.currentTimeMillis();
	}

	/**
	 * 停止
	 */
	public void stop() {
		// isStop = true;
		isPause = true;
	}

	/**
	 * 暂停 下一版本再说
	 */
	public void pause() {
		// if (!isPause) {
		// isPause = true;
		// for (int i = 0; i < this.getChildCount(); i++) {
		// getChildAt(i).getAnimation().cancel();
		// }
		// } else {
		// isPause = false;
		// for (int i = 0; i < this.getChildCount(); i++) {
		// getChildAt(i).getAnimation().start();
		// }
		// }
	}

	// 功能性模块
	private static String key = null;
	private static String sid = null;
	private static String Ip = "http://nathin.cn/BarrageApi.php";
//	private static String Ip = "http://192.168.1.105/phpserver/BarrageApi.php";
	private List<BarrageView> arrayList = null;
	private long starttime = 0;

	/**
	 * 注册应用id
	 * 
	 * @param key
	 *            请到官网申请
	 */
	public static void register(String key) {
		Barrage.key = key;
	}

	/**
	 * 设置弹幕源
	 * 
	 * @param sid
	 */
	public void setSource(String sourceId) {
		Barrage.sid = sourceId;
		getText();
	}

	private void getText() {
		new Thread() {
			@SuppressLint("NewApi")
			public void run() {
				Log.i("barrage", "gettext");
				HttpClient client = new DefaultHttpClient();
				String data="?appkey="+key+"&sid="+sid;
				HttpGet get = new HttpGet(Ip+data);
				try {
					HttpResponse response = client.execute(get);
					String msg = EntityUtils.toString(response.getEntity());
					if(msg==null||msg.isEmpty())return;
					Log.e("response", msg);
					arrayList=new ArrayList<Barrage.BarrageView>();
					String[] msgs=msg.split("\n");
					for(String m:msgs){
						if(m.isEmpty())continue;
						BarrageView barrageView=new BarrageView();
						int ils=m.indexOf(" ");
						String sl=m.substring(0,ils);
						barrageView.start=Long.parseLong(sl);
						barrageView.text=m.substring(ils+1);
						arrayList.add(barrageView);
					}
					if (arrayList != null){
//						for (BarrageView view : arrayList) {
//							view.text = URLDecoder.decode(view.text, "utf-8");
//						}
						Collections.sort(arrayList, new Comparator() {

							@Override
							public int compare(Object lhs, Object rhs) {
								// TODO Auto-generated method stub
								BarrageView lbv=(BarrageView) lhs;
								BarrageView rbv=(BarrageView) rhs;
								if(lbv.start>rbv.start)return 1;
								return -1;
							}
						});
					}
				} catch (ClientProtocolException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				} 
			};
		}.start();

	}

	/**
	 * 客户端读取形式
	 * @author cat
	 *
	 */
	public class BarrageView {
	public String text;
	public long start;
	}

	
	/**
	 * 发送弹幕
	 * 
	 * @param text
	 *            内容
	 */
	public void sendText(final String text) {
		long start = System.currentTimeMillis() - starttime;
		final String strstart = String.valueOf(start);
		Message msg = new Message();
		msg.obj = text;
		handler.sendMessage(msg);
		new Thread() {
			@Override
			public void run() {
				// TODO Auto-generated method stub
				try {
					HttpPost httpPost = new HttpPost(Ip);
					List<NameValuePair> params=new ArrayList<NameValuePair>();
					params.add(new BasicNameValuePair("appkey", key));
					params.add(new BasicNameValuePair("sid", sid));
					params.add(new BasicNameValuePair("text", text));
					params.add(new BasicNameValuePair("start", strstart));
					httpPost.setEntity(new UrlEncodedFormEntity(params, HTTP.UTF_8));
					HttpClient client = new DefaultHttpClient();
					Log.i("send:", text);
					client.execute(httpPost);
					Log.i("send", "success");
				} catch (ClientProtocolException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}
		}.start();
	}

	/**
	 * 配置服务网址
	 * 
	 * @param Ip
	 */
	public static void setHttpServer(String Ip) {
		Barrage.Ip = Ip;
	}

}
