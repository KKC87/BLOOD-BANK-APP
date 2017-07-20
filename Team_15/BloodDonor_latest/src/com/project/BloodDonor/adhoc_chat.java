package com.project.BloodDonor;

import android.app.*;
import android.os.*;
import java.io.IOException;
import java.io.PrintWriter;
import java.net.Socket;
import java.net.UnknownHostException;
import android.util.Log;
import android.content.Context;
import android.widget.*;
import android.os.*;
import android.app.Activity;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.util.Log;
import android.content.Context;
import android.widget.*;
import android.os.*;


public class adhoc_chat extends Activity implements LocationListener
{

	@Override
	public void onLocationChanged(Location p1)
	{
		latitude=p1.getLatitude();
		longitude=p1.getLongitude();
		// TODO: Implement this method
	}

	@Override
	public void onStatusChanged(String p1, int p2, Bundle p3)
	{
		// TODO: Implement this method
		Log.d("Latitude","status");
	}

	@Override
	public void onProviderEnabled(String p1)
	{
		// TODO: Implement this method
		Log.d("Latitude","enable");
	}

	@Override
	public void onProviderDisabled(String p1)
	{
		// TODO: Implement this method
		Log.d("Latitude","disable");
	}
	protected double latitude,longitude,flag=0;
	private Socket client;
	private PrintWriter printwriter;
	private EditText textField,dd;
	private Button button;
	private String messsage,ip;
	
    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.adhoc_chat);
		textField = (EditText) findViewById(R.id.editText1); // reference to the text field
		button = (Button) findViewById(R.id.button1); // reference to the send button
		dd = (EditText) findViewById(R.id.editText2); 
		// Button press event listener
		button.setOnClickListener(new View.OnClickListener() {

				public void onClick(View v) {
					ip=dd.getText().toString(); 
					messsage = textField.getText().toString(); // get the text message on the text field
					textField.setText(""); // Reset the text field to blank
					SendMessage sendMessageTask = new SendMessage();
					sendMessageTask.execute();
				}
			});
	}

	private class SendMessage extends AsyncTask<Void, Void, Void> {

		@Override
		protected Void doInBackground(Void... params) {
			try {

				String l=Double.toString(latitude);
				String x=Double.toString(longitude);
				client = new Socket(ip, 4444); // connect to the server
				printwriter = new PrintWriter(client.getOutputStream(), true);
				printwriter.write(messsage); // write the message to output stream
                printwriter.write(l);
				printwriter.write(x);
				printwriter.flush();
				printwriter.close();
				client.close(); // closing the connection

			} catch (UnknownHostException e) {
				e.printStackTrace();
			} catch (IOException e) {
				e.printStackTrace();
			}
			return null;
		}

	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		//getMenuInflater().inflate(R.menu.slimple_text_client, menu);
		return true;
    }
}
