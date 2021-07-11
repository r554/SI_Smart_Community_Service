package com.example.smartcommunityservice.helper;

import android.content.Context;
import android.content.SharedPreferences;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

public class VolleyHelper {
    private static VolleyHelper mInstance;
    private RequestQueue mRequestQueue;

    public static Context mCtx;
    public static final String SHARED_PREF_NAME = "sharedonasi";

    private static final String id_user = "id_user";

    private VolleyHelper(Context context) {
        mRequestQueue = Volley.newRequestQueue(context.getApplicationContext());
        mCtx = context;
    }

    public static synchronized VolleyHelper getInstance(Context context) {
        if (mInstance == null) {
            mInstance = new VolleyHelper(context);
        }
        return mInstance;
    }

    public RequestQueue getRequestQueue() {
        return mRequestQueue;
    }
    public String getId_user() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);

        return sharedPreferences.getString(id_user, null);
    }
}
