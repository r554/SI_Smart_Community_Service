package com.example.smartcommunityservice;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.AuthFailureError;
import com.android.volley.ClientError;
import com.android.volley.NetworkError;
import com.android.volley.NoConnectionError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.TimeoutError;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.smartcommunityservice.helper.ApiHelper;
import com.example.smartcommunityservice.helper.SessionHelper;
import com.example.smartcommunityservice.helper.VolleyHelper;
import com.google.android.gms.common.api.ApiException;
import com.google.android.gms.common.api.CommonStatusCodes;
import com.google.android.gms.safetynet.SafetyNet;
import com.google.android.gms.safetynet.SafetyNetApi;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.material.button.MaterialButton;
import com.google.android.material.snackbar.Snackbar;
import com.google.android.material.textfield.TextInputLayout;

import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class LoginActivity extends AppCompatActivity {
//    private static final String CAPTCHA_SITE_KEY = "6LcOI0IbAAAAAF7ltZKxQu_x0nKVMMsvYS0kBeNt";
//    private static final String CAPTCHA_SECRET_KEY = "6LcOI0IbAAAAAOUV8Lgn3CBjCpKu1zKmGn5TuPdq";

    TextInputLayout inputNIK;
    TextInputLayout inputPassword;

    MaterialButton loginButton;
    TextView lupaPasswordText;
    ProgressDialog progressDialog;

    SessionHelper sessionHelper;

    RequestQueue requestQueue;

    String nik;
    String password;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        //  init view call
        init();
    }

    private void init() {
        progressDialog = new ProgressDialog(this);
        requestQueue = VolleyHelper.getInstance(this).getRequestQueue();

        // instance helper
        sessionHelper = new SessionHelper(this);

        // init view
        loginButton = findViewById(R.id.loginButtonLogin);
        lupaPasswordText = findViewById(R.id.loginTextLupaPassword);
        inputNIK = findViewById(R.id.loginNIKInput);
        inputPassword = findViewById(R.id.loginPasswordInput);

        // button on click
        loginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                nik = inputNIK.getEditText().getText().toString().trim();
                password = inputPassword.getEditText().getText().toString().trim();
                doLogin(nik,password);
            }
        });

        //  lupa password on click
        lupaPasswordText.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent goToForgotPass = new Intent(LoginActivity.this, ForgotPasswordActivity.class);

                startActivity(goToForgotPass);
                finish();
            }
        });
    }

    private void doLogin(final String nik, final String password) {
        progressDialog.setMessage("Sedang Memproses...");
        progressDialog.setCancelable(false);
        progressDialog.show();

        StringRequest loginRequest = new StringRequest(Request.Method.POST, ApiHelper.LOGIN, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                progressDialog.dismiss();
                try {
                    JSONObject jsonObject = new JSONObject(response);

                    if (jsonObject.getString("status").equals("false")) {
                        Snackbar.make(findViewById(R.id.drawer_layout_login), jsonObject.getString("message"), Snackbar.LENGTH_LONG).show();
                        return;
                    }

                    JSONObject data = jsonObject.getJSONObject("data");

                    String id = data.getString("id_user");
                    String level = data.getString("level");
                    String nik = data.getString("nik");
                    String username = data.getString("username");

                    sessionHelper.createSession(nik, username, id, level);

                    Intent main = new Intent(LoginActivity.this, HomeActivity.class);
                    main.putExtra("ID_USER", id);
                    main.putExtra("LEVEL", level);
                    startActivity(main);
                    finish();
                } catch (Exception e) {
                    Snackbar.make(findViewById(R.id.drawer_layout_login), e.toString(), Snackbar.LENGTH_LONG).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                progressDialog.dismiss();
                String message = "Terjadi error. Coba beberapa saat lagi.";

                if (error instanceof NetworkError) {
                    message = "Tidak dapat terhubung ke internet. Harap periksa koneksi anda.";
                } else if (error instanceof AuthFailureError) {
                    message = "Gagal login. Harap periksa nik dan password anda.";
                } else if (error instanceof ClientError) {
                    message = "Gagal login. Harap periksa nik dan password anda.";
                } else if (error instanceof NoConnectionError) {
                    message = "Tidak ada koneksi internet. Harap periksa koneksi anda.";
                } else if (error instanceof TimeoutError) {
                    message = "Connection Time Out. Harap periksa koneksi anda.";
                }

                Snackbar.make(findViewById(R.id.drawer_layout_login), message, Snackbar.LENGTH_LONG).show();
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                params.put("nik", nik);
                params.put("password", password);
                return params;
            }
        };

        requestQueue.add(loginRequest);
    }
}