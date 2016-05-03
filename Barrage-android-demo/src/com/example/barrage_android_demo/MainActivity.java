package com.example.barrage_android_demo;

import com.cloudplugin.barrage.android.Barrage;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.EditText;

public class MainActivity extends Activity implements OnClickListener{
	Barrage barrage=null;
	EditText editText=null;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		barrage=(Barrage) findViewById(R.id.barrage1);
        barrage.register("abc");
        barrage.setSource("saa");
        findViewById(R.id.button1).setOnClickListener(this);
        findViewById(R.id.button2).setOnClickListener(this);
        findViewById(R.id.button3).setOnClickListener(this);
        findViewById(R.id.button4).setOnClickListener(this);
        findViewById(R.id.button5).setOnClickListener(this);
        editText=(EditText) findViewById(R.id.editText1);
	}

	@Override
	public void onClick(View arg0) {
		// TODO Auto-generated method stub
		switch(arg0.getId()){
		case R.id.button1:
			barrage.start();
			break;
		case R.id.button2:
			barrage.pause();
			break;
		case R.id.button3:
			barrage.stop();
			break;
		case R.id.button4:
			barrage.sendText(editText.getText().toString());
			break;
		case R.id.button5:
			barrage.setSource("saa");
			break;
		}
	}
}
