package cn.nathin.barrage;

import android.os.Build;

import com.zhy.http.okhttp.OkHttpUtils;
import com.zhy.http.okhttp.builder.PostFormBuilder;

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

import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;

/**
 * Created by cat on 16-4-8.
 * <p>
 * 通信能力库，是弹幕功能的基础
 * </p>
 * 想要自定义界面的话就直接使用通信能力库
 */
public class BarrageCA {
    // 功能性模块
    private static String key = null;//key全局唯一
    private static String Ip = "http://nathin.cn/BarrageApi.php";//IP全局唯一
    private String sid = null;//sid　资源id，不为一
    //	private static String Ip = "http://192.168.1.105/phpserver/BarrageApi.php";

    /**
     * 注册应用id
     *
     * @param key 请到官网申请
     */
    public static void register(String key) {
        BarrageCA.key = key;
    }

    /**
     * 设置弹幕源
     *
     * @param sourceId 资源id，推荐md5
     */
    public void setSource(String sourceId) {
        sid = sourceId;
    }


    /**
     * 用于兼容不同api的get
     * @param url
     * @return
     */
    private String get(String url) {
        String msg = null;
        if (Build.VERSION.SDK_INT > 21) {
            try {
                msg = OkHttpUtils.get().url(url).build().execute().body().string();
            } catch (IOException e) {
                e.printStackTrace();
            }
        } else {
            HttpClient client = new DefaultHttpClient();
            HttpGet get = new HttpGet(url);
            HttpResponse response = null;
            try {
                response = client.execute(get);
                msg = EntityUtils.toString(response.getEntity());
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        return msg;
    }

    /**
     * 用于兼容不同api的post
     * @param url
     * @param params
     */
    private void post(String url, List<NameValuePair> params) {
        if (Build.VERSION.SDK_INT > 21) {
            PostFormBuilder pfb = OkHttpUtils.post().url(url);
            for (NameValuePair nvp : params) {
                pfb.addParams(nvp.getName(), nvp.getValue());
            }
            try {
                pfb.build().execute();
            } catch (IOException e) {
                e.printStackTrace();
            }
        } else {
            try {
                HttpPost httpPost = new HttpPost(url);
                httpPost.setEntity(new UrlEncodedFormEntity(params, HTTP.UTF_8));
                HttpClient client = new DefaultHttpClient();
                client.execute(httpPost);
            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            } catch (ClientProtocolException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }

    /**
     * 获取弹幕，该函数会阻塞，请尽量于线程中调用
     * @return 返回弹幕列表
     */
    public ArrayList<BarrageView> getText() {
        String data = "?appkey=" + key + "&sid=" + sid;
        String msg = get(Ip + data);
        ArrayList<BarrageView> arrayList = new ArrayList<BarrageView>();
        if (msg == null || msg.isEmpty()) return arrayList;
        String[] msgs = msg.split("\n");
        for (String m : msgs) {
            if (m.isEmpty()) continue;
            BarrageView barrageView = new BarrageView();
            int ils = m.indexOf(" ");
            String sl = m.substring(0, ils);
            barrageView.start = Long.parseLong(sl);
            barrageView.text = m.substring(ils + 1);
            arrayList.add(barrageView);
        }
        if (arrayList != null) {
            Collections.sort(arrayList, new Comparator() {

                @Override
                public int compare(Object lhs, Object rhs) {
                    // TODO Auto-generated method stub
                    BarrageView lbv = (BarrageView) lhs;
                    BarrageView rbv = (BarrageView) rhs;
                    if (lbv.start > rbv.start) return 1;
                    return -1;
                }
            });
        }
        return arrayList;
    }






    /**
     * 发送弹幕
     * 可自定义时间参数的发送
     *
     * @param text  内容,不可以有换行符
     * @param start 内容的相关信息
     */
    public void sendText(final String text, long start) {
        if (text.indexOf("\n") >= 0) throw new Error("输入不可以有换行符");
        final String strstart = String.valueOf(start);
        new Thread() {
            @Override
            public void run() {
                // TODO Auto-generated method stub
                List<NameValuePair> params = new ArrayList<NameValuePair>();
                params.add(new BasicNameValuePair("appkey", key));
                params.add(new BasicNameValuePair("sid", sid));
                params.add(new BasicNameValuePair("text", text));
                params.add(new BasicNameValuePair("start", strstart));
                post(Ip, params);
            }
        }.start();
    }


    /**
     * 配置服务网址
     *
     * @param Ip　服务器地址
     */
    public static void setHttpServer(String Ip) {
        BarrageCA.Ip = Ip;
    }


    /**
     * 客户端读取形式
     *
     * @author cat
     */
    public class BarrageView {
        public String text;
        public long start;
    }

}
