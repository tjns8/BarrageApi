package cn.nathin.barrage;

import android.content.Context;
import android.os.Handler;
import android.os.Message;
import android.util.AttributeSet;
import android.util.Log;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AbsoluteLayout;
import android.widget.TextView;

import java.util.List;

/**
 * Created by cat on 16-4-8.
 * 图像展示库，专门针对图像业务
 */
public class BarrageViewImage extends AbsoluteLayout implements Handler.Callback{
    private Context context;
    private BarrageCA barrageCA;
    private List<BarrageCA.BarrageView> barrageViews;
    private Handler handler;
    private MessageViewCreater messageViewCreater;

    public BarrageViewImage(Context context) {
        super(context);
        init(context);
    }

    public BarrageViewImage(Context context, AttributeSet attrs) {
        super(context, attrs);
        init(context);
    }

    public BarrageViewImage(Context context, AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        init(context);
    }

    private void init(Context context) {
        this.context = context;
        barrageCA = new BarrageCA();
        handler=new Handler(this);
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

    private void addView(String text,int x,int y){
        Message msg=new Message();
        msg.obj=text;
        msg.arg1=x;
        msg.arg2=y;
        handler.sendMessage(msg);
    }

    /**
     * 更新弹幕
     */
    public void updataBarrageView(){
        if(barrageViews==null||barrageViews.size()==0)return;
        for(BarrageCA.BarrageView bv:barrageViews){
            int x= (int) (bv.start/100%100);
            int y= (int) (bv.start%100);
            int tx=getWidth()*x/100;
            int ty=getHeight()*y/100;
            addView(bv.text,tx,ty);
        }
    }

    public void sendText(String text,float dx,float dy){
        loge("input x "+dx+" y "+dy);
        loge("view w "+getWidth()+" h "+getHeight());
        int x= (int) (dx*100/getWidth())%100;
        int y= (int) (dy*100/getHeight())%100;
        long time=x*100+y;
        loge("out x "+x+" y "+y+" time "+time);

        barrageCA.sendText(text,time);
        addView(text,(int)dx,(int)dy);
    }

    /**
     * 设置自定义显示界面
     * @param messageViewCreater
     */
    public void setMessageViewCreater(MessageViewCreater messageViewCreater){
        this.messageViewCreater=messageViewCreater;
    }

    /**
     * 创建显示时的信息条
     * @param context
     * @return
     */
    private TextView createMessageView(Context context){
        if(messageViewCreater!=null)return messageViewCreater.createMessageView(context);
        return new TextView(context);
    }

    @Override
    public boolean handleMessage(Message msg) {
        TextView textView=createMessageView(context);
        textView.setText((String) msg.obj);
        addView(textView,new LayoutParams(ViewGroup.LayoutParams.WRAP_CONTENT, ViewGroup.LayoutParams.WRAP_CONTENT,msg.arg1,msg.arg2));
        return false;
    }

    interface MessageViewCreater{
        public TextView createMessageView(Context context);
    }
}
