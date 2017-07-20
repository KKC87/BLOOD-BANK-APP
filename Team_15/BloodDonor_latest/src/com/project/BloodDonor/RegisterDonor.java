package com.project.BloodDonor;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.URL;
import java.net.URLEncoder;


import android.app.Activity;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.StrictMode;
import android.preference.PreferenceManager;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

public class RegisterDonor extends Activity {
    /** Called when the activity is first created. */
	String uid,phone;
	EditText txtPhone,txtBG;
	
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.register);
        txtPhone=(EditText)findViewById(R.id.txtRPhone);
        txtBG=(EditText)findViewById(R.id.txtBloodGroup);
        
        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);
    }
    
    public void save(View v){
  		String phone,bg;
  		String totaldata="",inputline="";
  		phone=URLEncoder.encode(txtPhone.getText().toString());
  		bg=URLEncoder.encode(txtBG.getText().toString());
  		
  		try{
  			URL u=new URL("http://myspace.belgaumonline.com/ayesha/savedonor.php?phone="+ phone + "&bg=" + bg);
  			BufferedReader br=new BufferedReader(new InputStreamReader(u.openStream()));
  			while((inputline=br.readLine())!=null){
  				totaldata=totaldata + inputline;
  			}
  		}catch (Exception e) {
			Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();
		}
  		if(totaldata.contains("already exists")){
  			Toast.makeText(getApplicationContext(), totaldata, Toast.LENGTH_LONG).show();
  		}else{
  			Toast.makeText(getApplicationContext(), totaldata, Toast.LENGTH_LONG).show();
  			SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(this);
	    	 SharedPreferences.Editor editor = preferences.edit();
	    	 editor.putString("phone",phone);
	    	 editor.commit();
  		}
  	}
  }