package projeto.setran.computerscience.com.br.setranprojeto.adapter;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Context;
import android.os.Build;
import android.support.annotation.RequiresApi;
import android.support.v7.widget.PopupMenu;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;

import java.util.List;
import java.util.Objects;

import projeto.setran.computerscience.com.br.setranprojeto.R;
import projeto.setran.computerscience.com.br.setranprojeto.domain.Noticia;

public class NoticiasAdapter extends RecyclerView.Adapter<NoticiasAdapter.MyViewHolder> {

    private Context mContext;
    private List<Noticia> noticiaList;
    private Noticia noticia;
    private Activity activity;


    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView title;
        public ImageView thumbnail;

        public MyViewHolder(View view) {
            super(view);
            title = (TextView) view.findViewById(R.id.title);
            thumbnail = (ImageView) view.findViewById(R.id.thumbnail);
        }
    }


    public NoticiasAdapter(Context mContext, List<Noticia> noticiaList, Activity activity) {
        this.mContext = mContext;
        this.noticiaList = noticiaList;
        this.activity  =  activity;
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.noticia_item, parent, false);

        return new MyViewHolder(itemView);
    }

    @SuppressLint("SetTextI18n")
    @RequiresApi(api = Build.VERSION_CODES.KITKAT)
    @Override
    public void onBindViewHolder(final MyViewHolder holder, int position) {
        noticia = noticiaList.get(position);
        holder.title.setText(noticia.getTitulo());

        // loading album cover using Glide library
        Glide.with(mContext).load(noticia.getImagem()).into(holder.thumbnail);

    }

    @Override
    public int getItemCount() {
        return noticiaList.size();
    }
}