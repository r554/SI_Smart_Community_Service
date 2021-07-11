package com.example.smartcommunityservice.fragment;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Location;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.LinearLayout;
import android.widget.ScrollView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
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
import com.example.smartcommunityservice.DetailLaporanActivity;
import com.example.smartcommunityservice.HomeActivity;
import com.example.smartcommunityservice.R;
import com.example.smartcommunityservice.adapter.LaporanAdapter;
import com.example.smartcommunityservice.helper.ApiHelper;
import com.example.smartcommunityservice.helper.SessionHelper;
import com.example.smartcommunityservice.helper.VolleyHelper;
import com.example.smartcommunityservice.model.LaporanItem;
import com.google.android.gms.location.FusedLocationProviderClient;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.android.gms.maps.model.PointOfInterest;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.android.material.button.MaterialButton;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Locale;

/**
 * A simple {@link Fragment} subclass.
 * Use the {@link HomeFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class HomeFragment extends Fragment {

    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    private RequestQueue requestQueue;
    private SessionHelper sessionHelper;

    private ArrayList<LaporanItem> laporanList;
    // Widget
    private RecyclerView laporanRecyclerView;
    private LaporanAdapter laporanAdapter;
    private RecyclerView.LayoutManager laporanLayoutManager;

    private MaterialButton cobaButton;

    private LinearLayout errorLayout,loadingLayout;

    public HomeFragment() {
        // Required empty public constructor
    }

    // TODO: Rename and change types and number of parameters
    public static HomeFragment newInstance(String param1, String param2) {
        HomeFragment fragment = new HomeFragment();
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
        View view = inflater.inflate(R.layout.fragment_home, container, false);

        init(view);

        return view;
    }

    private void init(View view) {
        sessionHelper = new SessionHelper(getContext());

        cobaButton = view.findViewById(R.id.button_coba_home);
        errorLayout = view.findViewById(R.id.home_error_request);
        requestQueue = VolleyHelper.getInstance(getContext()).getRequestQueue();

        //  setup recycler view
        laporanRecyclerView = view.findViewById(R.id.recyclerViewHomeAdmin);
        laporanRecyclerView.setHasFixedSize(true);

        getHomeLaporan();
}

    private void getHomeLaporan() {
        errorLayout.setVisibility(View.GONE);

        StringRequest getRecentLaporan = new StringRequest(Request.Method.GET, ApiHelper.ALL_LAPORAN, new Response.Listener<String>() {
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
                    laporanList = new ArrayList<>();

                    for (int i = 0; i < data.length(); i++) {
                        JSONObject objectLaporan = data.getJSONObject(i);

                        laporanList.add(new LaporanItem(
                                objectLaporan.getInt("id_laporan"),
                                objectLaporan.getInt("id_user"),
                                objectLaporan.getString("id_dinas"),
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
                    laporanAdapter = new LaporanAdapter(laporanList);

                    laporanRecyclerView.setLayoutManager(laporanLayoutManager);
                    laporanRecyclerView.setAdapter(laporanAdapter);

                    // handle onclick card
                    laporanAdapter.setOnItemCliclListener(new LaporanAdapter.OnItemClickListener() {
                        @Override
                        public void onItemClick(int position) {
                           Intent toDetail = new Intent(getActivity().getApplicationContext(), DetailLaporanActivity.class);
                            toDetail.putExtra("INTENT_FROM", "HOME");
                            toDetail.putExtra("ID_LAPORAN", String.valueOf(laporanList.get(position).getIdLaporan()));
                            startActivity(toDetail);
                            getActivity().finish();
                        }
                    });

                    errorLayout.setVisibility(View.GONE);
                    laporanRecyclerView.setVisibility(View.VISIBLE);
                } catch (Exception e) {
                    errorLayout.setVisibility(View.VISIBLE);
                    Toast.makeText(getContext(), e.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                String message = "Terjadi error. Coba beberapa saat lagi.";

                if (error instanceof NetworkError) {
                    message = "Tidak dapat terhubung ke internet. Harap periksa koneksi anda.";
                } else if (error instanceof AuthFailureError) {
                    message = "Gagal login. Harap periksa email dan password anda.";
                } else if (error instanceof ClientError) {
                    message = "Gagal login. Harap periksa email dan password anda.";
                } else if (error instanceof NoConnectionError) {
                    message = "Tidak ada koneksi internet. Harap periksa koneksi anda.";
                } else if (error instanceof TimeoutError) {
                    message = "Connection Time Out. Harap periksa koneksi anda.";
                }

//                Fragment errorFragment = new ErrorFragment();
//                getSupportFragmentManager().beginTransaction().replace(R.id.container_user, errorFragment).commit();
                Toast.makeText(getContext(), message, Toast.LENGTH_SHORT).show();

                errorLayout.setVisibility(View.VISIBLE);
            }
        });
        requestQueue.add(getRecentLaporan);
    }
}