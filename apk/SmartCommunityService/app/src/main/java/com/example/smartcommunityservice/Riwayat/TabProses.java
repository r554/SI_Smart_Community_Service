package com.example.smartcommunityservice.Riwayat;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

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
import com.android.volley.toolbox.Volley;
import com.example.smartcommunityservice.DetailLaporanActivity;
import com.example.smartcommunityservice.R;
import com.example.smartcommunityservice.adapter.AdapterHistoryLaporan;
import com.example.smartcommunityservice.helper.ApiHelper;
import com.example.smartcommunityservice.helper.SessionHelper;
import com.example.smartcommunityservice.helper.Util;
import com.example.smartcommunityservice.helper.VolleyHelper;
import com.example.smartcommunityservice.model.ModelHistoryLaporan;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;


public class TabProses extends Fragment {


    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    private ArrayList<ModelHistoryLaporan> modelHistoryLaporanList;
    private RequestQueue requestQueue;
    private AdapterHistoryLaporan adapterHistoryLaporan;
    private RecyclerView.LayoutManager laporanLayoutManager;
    private RecyclerView rv_domisili;
    private String id_user;

    private SessionHelper sessionHelper;
    public TabProses() {

    }


    // TODO: Rename and change types and number of parameters
    public static TabProses newInstance(String param1, String param2) {
        TabProses fragment = new TabProses();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
            mParam1 = getArguments().getString(ARG_PARAM1);
            mParam2 = getArguments().getString(ARG_PARAM2);
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_tab_proses, container, false);

        init(view);
        return view;
    }


    private void init(View view) {
        sessionHelper = new SessionHelper(getContext());
        id_user = sessionHelper.getIdUser();

        requestQueue = VolleyHelper.getInstance(getContext()).getRequestQueue();

        //  setup recycler view
        rv_domisili = view.findViewById(R.id.rv_history_suket_domisili);
        rv_domisili.setHasFixedSize(true);

        HistoryDataLaporan();
    }

    private void HistoryDataLaporan()
    {
        StringRequest stringRequest  = new StringRequest(Request.Method.GET, ApiHelper.URL_GET_HISTORY_LAPORAN_PROSES + id_user,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);

                            // jika status false
                            if (jsonObject.getString("status").equals("false")) {
                                Toast.makeText(getContext(), jsonObject.getString("message"), Toast.LENGTH_SHORT).show();
                                return;
                            }

                            JSONArray data = jsonObject.getJSONArray("data");
                            modelHistoryLaporanList = new ArrayList<>();

                            for (int i = 0; i < data.length(); i++) {
                                JSONObject objectLaporan = data.getJSONObject(i);

                                modelHistoryLaporanList.add(new ModelHistoryLaporan(
                                        objectLaporan.getInt("id_laporan"),
                                        objectLaporan.getInt("id_user"),
                                        objectLaporan.getString("judul"),
                                        objectLaporan.getString("deskripsi"),
                                        objectLaporan.getString("tanggal"),
                                        objectLaporan.getString("alamat"),
                                        objectLaporan.getDouble("lat"),
                                        objectLaporan.getDouble("lng"),
                                        objectLaporan.getString("foto"),
                                        objectLaporan.getString("status")
                                ));
                            }

                            laporanLayoutManager = new LinearLayoutManager(getActivity().getApplicationContext());
                            adapterHistoryLaporan = new AdapterHistoryLaporan(modelHistoryLaporanList);

                            rv_domisili.setLayoutManager(laporanLayoutManager);
                            rv_domisili.setAdapter(adapterHistoryLaporan);

                            // handle onclick card
                            adapterHistoryLaporan.setOnItemCliclListener(new AdapterHistoryLaporan.OnItemClickListener() {
                                @Override
                                public void onItemClick(int position) {
//                            Toast.makeText(getActivity().getApplicationContext(), "ID: " + modelHistoryLaporanList.get(position).getIdLaporan(), Toast.LENGTH_SHORT).show();
                                    Intent toDetail = new Intent(getActivity().getApplicationContext(), DetailLaporanActivity.class);
                                    toDetail.putExtra("INTENT_FROM", "HOME");
                                    toDetail.putExtra("ID_LAPORAN", String.valueOf(modelHistoryLaporanList.get(position).getIdLaporan()));
                                    startActivity(toDetail);
                                    getActivity().finish();
                                }
                            });

                            rv_domisili.setVisibility(View.VISIBLE);
                        } catch (Exception e) {
                            Toast.makeText(getContext(), e.getMessage(), Toast.LENGTH_SHORT).show();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                String message = "History.";

                if (error instanceof NetworkError) {
                    message = "Tidak Ada History.";
                } else if (error instanceof AuthFailureError) {
                    message = "Tidak Ada History.";
                } else if (error instanceof ClientError) {
                    message = "Tidak Ada History";
                } else if (error instanceof NoConnectionError) {
                    message = "Tidak Ada History.";
                } else if (error instanceof TimeoutError) {
                    message = "Tidak Ada History";
                }

                Toast.makeText(getContext(), message, Toast.LENGTH_SHORT).show();

            }
        });

        requestQueue.add(stringRequest);
    }

}