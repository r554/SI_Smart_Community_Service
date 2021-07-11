package com.example.smartcommunityservice.fragment;

import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;
import androidx.viewpager.widget.ViewPager;

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
import com.example.smartcommunityservice.AdapterTab.SectionsPagerAdapter;
import com.example.smartcommunityservice.AddLaporanActivity;
import com.example.smartcommunityservice.DetailLaporanActivity;
import com.example.smartcommunityservice.R;
import com.example.smartcommunityservice.adapter.LaporanAdapter;
import com.example.smartcommunityservice.helper.ApiHelper;
import com.example.smartcommunityservice.helper.VolleyHelper;
import com.example.smartcommunityservice.model.LaporanItem;
import com.google.android.material.button.MaterialButton;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.tabs.TabLayout;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.ArrayList;

public class AddLaporanFragment extends Fragment {

//    public void onClick() {
//        // super.onBackPressed();
//        Intent toAddLaporan = new Intent(getActivity().getApplicationContext(), AddLaporanActivity.class);
//        startActivity(toAddLaporan);
//        getActivity().finish();
//    }
//    private FloatingActionButton laporanaFABAddlaporan;
//
    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View root = inflater.inflate(R.layout.fragment_addlaporan, container, false);

        startActivity(new Intent(getContext(), AddLaporanActivity.class));
        return root;
    }
    //
//    @Override
//    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
//        laporanaFABAddlaporan = view.findViewById(R.id.laporanFABAddLaporan);
//
//        laporanaFABAddlaporan.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                Intent toAddLaporan = new Intent(getActivity().getApplicationContext(), AddLaporanActivity.class);
//                startActivity(toAddLaporan);
//                getActivity().finish();
//            }
//        });
//    }
//
//    private void init(View view) {
//        laporanaFABAddlaporan = view.findViewById(R.id.laporanFABAddLaporan);
//
//        laporanaFABAddlaporan.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                Intent toAddLaporan = new Intent(getActivity().getApplicationContext(), AddLaporanActivity.class);
//                startActivity(toAddLaporan);
//                getActivity().finish();
//            }
//        });
//    }


}