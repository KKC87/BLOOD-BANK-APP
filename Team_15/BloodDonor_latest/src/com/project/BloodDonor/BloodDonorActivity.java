package com.project.BloodDonor;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.URL;


import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Bundle;
import android.os.StrictMode;
import android.preference.PreferenceManager;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class BloodDonorActivity extends Activity {
    /** Called when the activity is first created. */
	String lngVal;
	String latVal;
	String uid,phone;
	LocationManager lm;
	TextView txtLat,txtLng,txtPhone;
	Button btn11;
	
	
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        
        btn11=(Button)findViewById(R.id.bbbb);
        txtLat=(TextView)findViewById(R.id.txtLat);
        txtLng=(TextView)findViewById(R.id.txtLng);
        txtPhone=(TextView)findViewById(R.id.txtHomePhone);
        
        btn11.setOnClickListener(new OnClickListener() {
			public void onClick(View arg0) {
 
				// Start NewActivity.class
				Intent myIntent = new Intent(BloodDonorActivity.this,
						adhoc_chat.class);
				startActivity(myIntent);
			}

			
		});
        

        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);
        
        MyLocationListener mll=new MyLocationListener();
        
        lm=(LocationManager)getSystemService(Context.LOCATION_SERVICE);
        lm.requestLocationUpdates(LocationManager.GPS_PROVIDER, 2000, 2, mll);
        
        //..........Check if details saved
        SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(this);
        phone=preferences.getString("phone","");
        
        if(phone.compareTo("")==0){
        	Toast.makeText(getApplicationContext(), "Please register to use the Application", Toast.LENGTH_LONG).show();
        }else{
        	txtPhone.setText(phone);
        }   
    }
    
    //...Menu
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.mainmenu, menu);
        return true;
    }
    
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
    	switch (item.getItemId()) {
            case R.id.mnuRegister:
            	//..Open Configure Activity
            	Intent i=new Intent(BloodDonorActivity.this,RegisterDonor.class);
            	startActivity(i); 
            	return true;
          
		    case R.id.mnuSearchDonor:
		    	//..Open Configure Activity
		    	Intent i1=new Intent(BloodDonorActivity.this,SearchDonor.class);
		    	startActivity(i1); 
		    	return true;
		    
		    case R.id.mnuSearchBank:
		    	//..Open Configure Activity
		    	Intent i2=new Intent(BloodDonorActivity.this,SearchBloodBank.class);
		    	startActivity(i2); 
		    	return true;
    	}
		return false;	
    }    
    
    private class MyLocationListener implements LocationListener{
		public void onLocationChanged(Location lcn) {	
			lngVal = String.format("%1$s",lcn.getLongitude());
    		latVal = String.format("%1$s",lcn.getLatitude());
			txtLat.setText(latVal);
			txtLng.setText(lngVal);
			//.......Update the location in the cloud server
			if(latVal.compareTo("")==0 || lngVal.compareTo("")==0 || phone.compareTo("")==0){
	       		 //Toast.makeText(getApplicationContext(), "Please register before we update your location", Toast.LENGTH_LONG).show();
	       	}else{
	       		String inputline="",totaldata="";
	       		try{	
	    			URL u=new URL("http://myspace.belgaumonline.com/ayesha/updatelocation.php?lat="+ latVal + "&lng=" + lngVal + "&phone=" + phone);
				 	BufferedReader br=new BufferedReader(new InputStreamReader(u.openStream()));
	    	  		while((inputline=br.readLine())!=null){
	    	  			totaldata=totaldata + inputline;
	    	  		}
	    	  		SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
	    	  		SharedPreferences.Editor editor1 = preferences.edit();
	    	  		editor1.putString("lat",latVal);
	    	  		editor1.putString("lng",lngVal);
	    	  		editor1.commit();
	    	  		//Toast.makeText(getApplicationContext(), totaldata, Toast.LENGTH_LONG).show();
	       		}catch (Exception e) {
	       			Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();
			 	}
	       	}
		}  
    	public void onStatusChanged(String s, int i, Bundle b) {}  
    	public void onProviderDisabled(String s) {}  
    	public void onProviderEnabled(String s) {}  
	}
}