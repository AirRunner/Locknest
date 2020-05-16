package com.securious.locknest;

import androidx.appcompat.app.AppCompatActivity;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.Bundle;

import android.view.View.OnClickListener;
import android.view.SurfaceHolder;
import android.widget.Button;
import android.widget.EditText;
import android.content.pm.ActivityInfo;
import android.view.WindowManager;
import android.view.View;
import android.util.Log;
import androidx.appcompat.app.AlertDialog;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import android.content.DialogInterface;


import net.majorkernelpanic.streaming.Session;
import net.majorkernelpanic.streaming.SessionBuilder;
import net.majorkernelpanic.streaming.audio.AudioQuality;
import net.majorkernelpanic.streaming.gl.SurfaceView;
import net.majorkernelpanic.streaming.video.VideoQuality;

public class Stream extends AppCompatActivity implements OnClickListener, Session.Callback, SurfaceHolder.Callback {

    private final static String TAG = "BOBO";

    private Button mButton1, mButton2;
    private SurfaceView mSurfaceView;
    private EditText mEditText;
    private Session mSession;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_stream);

        // Ask for camera permissions
        if (ContextCompat.checkSelfPermission(Stream.this,
                Manifest.permission.CAMERA)
                != PackageManager.PERMISSION_GRANTED) {
            if (!ActivityCompat.shouldShowRequestPermissionRationale(Stream.this,
                    Manifest.permission.CAMERA)) {
                ActivityCompat.requestPermissions(Stream.this,
                        new String[]{Manifest.permission.CAMERA},
                        PackageManager.PERMISSION_GRANTED);
            }
        }

        // Ask for mic permissions
        if (ContextCompat.checkSelfPermission(Stream.this,
                Manifest.permission.RECORD_AUDIO)
                != PackageManager.PERMISSION_GRANTED) {
            if (!ActivityCompat.shouldShowRequestPermissionRationale(Stream.this,
                    Manifest.permission.RECORD_AUDIO)) {
                ActivityCompat.requestPermissions(Stream.this,
                        new String[]{Manifest.permission.RECORD_AUDIO},
                        PackageManager.PERMISSION_GRANTED);
            }
        }

        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_UNSPECIFIED);
        getWindow().addFlags(WindowManager.LayoutParams.FLAG_KEEP_SCREEN_ON);

        mButton1 = (Button) findViewById(R.id.button1);
        mButton2 = (Button) findViewById(R.id.button2);
        mSurfaceView = (SurfaceView) findViewById(R.id.surface);
        mEditText = (EditText) findViewById(R.id.editText1);

        mSession = SessionBuilder.getInstance()
                .setCallback(this)
                .setSurfaceView(mSurfaceView)
                .setPreviewOrientation(90)
                .setContext(getApplicationContext())
                .setAudioEncoder(SessionBuilder.AUDIO_AAC)
                .setAudioQuality(new AudioQuality(16000, 32000))
                .setVideoEncoder(SessionBuilder.VIDEO_H264)
                .setVideoQuality(new VideoQuality(320,240,20,500000))
                .build();

        mButton1.setOnClickListener(this);
        mButton2.setOnClickListener(this);

        mSurfaceView.getHolder().addCallback(this);
    }

    @Override
    public void onResume() {
        super.onResume();
        if (mSession.isStreaming()) {
            mButton1.setText("Stop");
        } else {
            mButton1.setText("Start");
        }
    }

    @Override
    public void onDestroy() {
        super.onDestroy();
        mSession.release();
    }

    @Override
    public void onClick(View v) {
        if (v.getId() == R.id.button1) {
            // Start and stop streaming
            mSession.setDestination(mEditText.getText().toString());
            if (!mSession.isStreaming()) {
                mSession.configure();
            } else {
                mSession.stop();
            }
            mButton1.setEnabled(false);
        } else {
            // Switch between the cameras
            mSession.switchCamera();
        }
    }

    @Override
    public void onBitrateUpdate(long bitrate) {
        Log.d(TAG,"Bitrate: "+bitrate);
    }

    @Override
    public void onSessionError(int message, int streamType, Exception e) {
        mButton1.setEnabled(true);
        if (e != null) {
            logError(e.getMessage());
        }
    }

    @Override

    public void onPreviewStarted() {
        Log.d(TAG,"Preview started.");
    }

    @Override
    public void onSessionConfigured() {
        Log.d(TAG,"Preview configured.");
        /*  Once the stream is configured, while streaming we can send a SDP formatted session
            description (in a .sdp file for instance) to the receiving server.
        */
        Log.d(TAG, mSession.getSessionDescription());
        mSession.start();
    }

    @Override
    public void onSessionStarted() {
        Log.d(TAG,"Session started.");
        mButton1.setEnabled(true);
        mButton1.setText("Stop");
    }

    @Override
    public void onSessionStopped() {
        Log.d(TAG,"Session stopped.");
        mButton1.setEnabled(true);
        mButton1.setText("Start");
    }

    /** Displays a popup to report the error to the user */
    private void logError(final String msg) {
        final String error = (msg == null) ? "Error unknown" : msg;
        AlertDialog.Builder builder = new AlertDialog.Builder(Stream.this);
        builder.setMessage(error).setPositiveButton("OK", new DialogInterface.OnClickListener() {
            public void onClick(DialogInterface dialog, int id) {}
        });
        AlertDialog dialog = builder.create();
        dialog.show();
    }

    @Override
    public void surfaceChanged(SurfaceHolder holder, int format, int width,
                               int height) {

    }

    @Override
    public void surfaceCreated(SurfaceHolder holder) {
        mSession.startPreview();
    }

    @Override
    public void surfaceDestroyed(SurfaceHolder holder) {
        mSession.stop();
    }

    public void goToLocation(View v)
    {
        Intent intent = new Intent(Stream.this, LocationTracker.class);
        startActivity(intent);
        finish();
    }

}
