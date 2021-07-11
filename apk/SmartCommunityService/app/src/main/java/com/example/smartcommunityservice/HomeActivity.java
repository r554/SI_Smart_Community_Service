package com.example.smartcommunityservice;

import android.content.DialogInterface;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.fragment.app.Fragment;

//import com.example.pelaporanbakesbangpolmalang.fragment.HomeFragment;
import com.example.smartcommunityservice.fragment.AddLaporanFragment;
import com.example.smartcommunityservice.fragment.HomeFragment;
import com.example.smartcommunityservice.fragment.PasswordFragment;
import com.example.smartcommunityservice.fragment.PemberitahuanFragment;
import com.example.smartcommunityservice.fragment.ProfileFragment;
import com.example.smartcommunityservice.fragment.RiwayatFragment;
import com.google.android.material.bottomnavigation.BottomNavigationView;

public class HomeActivity extends AppCompatActivity{

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        BottomNavigationView bottomNav = findViewById(R.id.bottom_navigation);
        bottomNav.setOnNavigationItemSelectedListener(navListenener);

        if(savedInstanceState == null)
        {
            bottomNav.setSelectedItemId(R.id.nav_home);
        }
    }

    private BottomNavigationView.OnNavigationItemSelectedListener navListenener =
            new BottomNavigationView.OnNavigationItemSelectedListener() {
                @Override
                public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                    Fragment selectedFragment = null;

                    switch (item.getItemId())
                    {
                        case R.id.nav_home :
                            selectedFragment = new HomeFragment();
                            break;
                        case R.id.menu_laporan:
                            selectedFragment = new RiwayatFragment();
                            break;
                        case R.id.nav_lapor:
                            selectedFragment = new AddLaporanFragment();
                            break;
                        case R.id.menu_pemberitahuan:
                            selectedFragment = new PemberitahuanFragment();
                            break;
                        case R.id.menu_profile:
                            selectedFragment = new ProfileFragment();
                            break;
                    }
                    getSupportFragmentManager().beginTransaction().replace(R.id.fragment_container, selectedFragment).commit();
                    return true;
                }
            };



    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater inflater = getMenuInflater();
        return true;
    }

    public void onBackPressed() {
        new AlertDialog.Builder(this)
                .setTitle("Keluar Aplikasi")
                .setMessage("Apakah Anda Ingin Keluar Dari Aplikasi?")
                .setPositiveButton("Ya", new DialogInterface.OnClickListener()
                {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        ActivityCompat.finishAffinity(HomeActivity.this);
                        finish();
                    }

                })
                .setNegativeButton("Tidak", null)
                .show();
    }

}