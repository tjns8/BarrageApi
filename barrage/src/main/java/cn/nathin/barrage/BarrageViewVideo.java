package cn.nathin.barrage;

import android.content.Context;
import android.graphics.Color;
import android.os.Handler;
import android.os.Message;
import android.util.AttributeSet;
import android.util.Log;
import android.view.animation.Animation;
import android.view.animation.TranslateAnimation;
import android.widget.AbsoluteLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

import java.util.List;

/**
 * Created by cat on 16-4-8.
 * 视屏集成库，专门针对视屏类业务
 */
public class BarrageViewVideo extends AbsoluteLayout implements Handler.Callback, Runnable {
    private Context context;
    private BarrageCA barrageCA;
    private List<BarrageCA.BarrageView> barrageViews;
    private Thread moveThread;
    private Handler handler;
    private long start_time;

    public BarrageViewVideo(Context context) {
        super(context);
        init(context);
    }

    public BarrageViewVideo(Context context, AttributeSet attrs) {
        super(context, attrs);
        init(context);
    }

    public BarrageViewVideo(Context context, AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        init(context);
    }

    private void init(Context context) {
        this.context = context;
        barrageCA = new BarrageCA();
        handler = new Handler(this);
    }

    private void loge(String msg) {
        Log.e("BarrageViewVideo", msg);
    }

    /**
     * 设置资源
     *
     * @param sourceId 最好是纯数字字母组成，例如md5
     */
    public void setSourceId(String sourceId) {
        barrageCA.setSource(sourceId);
    }

    /**
     * 加载弹幕，网络访问，会阻塞
     */
    public void getText() {
        barrageViews = barrageCA.getText();
    }

    /**
     * 开始播放
     */
    public void start() {
        if (moveThread != null) return;
        moveThread = new Thread(this);
        moveThread.start();
        start_time = System.currentTimeMillis();
    }

    /**
     * 发送
     * @param text 待发送的内容
     */
    public void sendText(String text) {
        barrageCA.sendText(text, System.currentTimeMillis() - start_time);
        Message msg=new Message();
        msg.obj=text;
        msg.arg1=20;
        msg.arg2=Color.RED;
        handler.sendMessage(msg);
    }

    /**
     * <p>
     * 显示一条消息到屏幕上
     * </p>
     * <p>
     * 默认高度随机
     * </p>
     *
     * @param msg obj：字符，arg1：字体大小，arg2：字体颜色
     * @return ..
     */
    @Override
    public boolean handleMessage(Message msg) {
        final TextView child = new TextView(context);
        String text = (String) msg.obj;
        int width = getWidth();
        int height = (int) (getHeight() * Math.random());
        child.setTextSize(msg.arg1);
        child.setText(text);
        child.setTextColor(msg.arg2);
        TranslateAnimation animation = new TranslateAnimation(width, -width, height, height);
        animation.setAnimationListener(new Animation.AnimationListener() {

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
                removeView(child);
            }
        });
        animation.setDuration(3000);
        child.startAnimation(animation);
        addView(child, AbsoluteLayout.LayoutParams.WRAP_CONTENT, AbsoluteLayout.LayoutParams.WRAP_CONTENT);
        AbsoluteLayout.LayoutParams lp = (AbsoluteLayout.LayoutParams) child.getLayoutParams();
        lp.x = width;
        lp.y = height;
        child.setLayoutParams(lp);
        return false;
    }

    /**
     * 显示控制逻辑
     */
    @Override
    public void run() {
        if (barrageViews == null) {
            loge("数据获取失败");
            return;
        }
        long oldtime = 0;
        for (int i = 0; i < barrageViews.size(); i++) {
            BarrageCA.BarrageView view1 = barrageViews.get(i);
            Message msg = new Message();
            msg.obj = view1.text;
            msg.arg1 = 20;
            msg.arg2 = Color.RED;
            long time = view1.start;
            try {
                Thread.sleep(time - oldtime);
            } catch (InterruptedException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
            oldtime = time;
            handler.sendMessage(msg);
        }
    }
}
