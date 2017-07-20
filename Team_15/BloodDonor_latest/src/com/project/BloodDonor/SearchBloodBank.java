package com.project.BloodDonor;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.URL;
import java.net.URLEncoder;

import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.Uri;
import android.os.Bundle;
import android.os.StrictMode;
import android.preference.PreferenceManager;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.GridView;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.AdapterView.OnItemClickListener;

public class SearchBloodBank extends Activity {
    /** Called when the activity is first created. */
	String uid,phone;
	String lngVal;
	String latVal;
	EditText txtBG;
	TextView txtLat,txtLng;
	String savedLng,savedLat;
	GridView grid;
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.searchbank);
        txtLat=(TextView)findViewById(R.id.txtBLat);
        txtLng=(TextView)findViewById(R.id.txtBLng);
        grid = (GridView)findViewById(R.id.grid1);
       	
        txtBG=(EditText)findViewById(R.id.txtBBloodGroup);
        
        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);
        
        SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(this);
        savedLat=preferences.getString("lat","");
        savedLng=preferences.getString("lng","");
        txtLat.setText(savedLat);
		txtLng.setText(savedLng);
        
		//.....On item click
		grid.setOnItemClickListener(new OnItemClickListener() {
	        public void onItemClick(AdapterView<?> parent, View v, int position, long id) {
          		try{
          			Object o =parent.getItemAtPosition(position);
    	            String phno = o.toString();
    	            Intent callIntent = new Intent(Intent.ACTION_CALL);
	                callIntent.setData(Uri.parse("tel:" + phno));
	                startActivity(callIntent);
          		}catch(Exception e){
          			Toast.makeText(getApplicationContext(), e.getMessage(), Toast.LENGTH_SHORT).show();
          		}            
	        }
	    });
    }
    
    public void searchbank(View v){
  		String bg;
  		String totaldata="",inputline="";
  		bg=URLEncoder.encode(txtBG.getText().toString());
  		
  		try{
			
			URL u=new URL("http://myspace.belgaumonline.com/ayesha/searchbank.php?lat="+ savedLat + "&lng=" + savedLng + "&bg=" + bg);
		 	BufferedReader br=new BufferedReader(new InputStreamReader(u.openStream()));
	  		while((inputline=br.readLine())!=null){
	  			totaldata=totaldata + inputline;
	  		}
	  		Toast.makeText(getApplicationContext(), totaldata, Toast.LENGTH_LONG).show();
	  		//...Split the data string and send SMS to all
	  		String[] temp = totaldata.split("_");
	  		ArrayAdapter<String> adapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1,temp);
	    	grid.setAdapter(adapter);
	  		
  		}catch (Exception e) {
		 Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();
  		}
  	}
    
  }