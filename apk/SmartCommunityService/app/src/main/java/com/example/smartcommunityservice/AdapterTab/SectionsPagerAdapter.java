package com.example.smartcommunityservice.AdapterTab;

import android.content.Context;

import androidx.annotation.Nullable;
import androidx.annotation.StringRes;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentPagerAdapter;

import com.example.smartcommunityservice.R;
import com.example.smartcommunityservice.Riwayat.TabMenunggu;
import com.example.smartcommunityservice.Riwayat.TabProses;
import com.example.smartcommunityservice.Riwayat.TabSelesai;
import com.example.smartcommunityservice.Riwayat.TabTolak;

public class SectionsPagerAdapter extends FragmentPagerAdapter {

    @StringRes
    private static final int[] TAB_TITLES = new int[]{R.string.tab_text_1, R.string.tab_text_2, R.string.tab_text_3, R.string.tab_text_4};
    private final Context mContext;

    public SectionsPagerAdapter(Context context, FragmentManager fm) {
        super(fm);
        mContext = context;
    }

    @Override
    public Fragment getItem(int position) {
        Fragment fragment = null;
        switch (position)
        {
            case 0:
                fragment = new TabMenunggu();
                break;
            case 1:
                fragment = new TabProses();
                break;
            case 2:
                fragment = new TabSelesai();
                break;
            case 3:
                fragment = new TabTolak();
                break;
        }
        return fragment;
    }

    @Nullable
    @Override
    public CharSequence getPageTitle(int position) {
        return mContext.getResources().getString(TAB_TITLES[position]);
    }

    @Override
    public int getCount() {
        // Show 3 total pages.
        return 4;
    }
}