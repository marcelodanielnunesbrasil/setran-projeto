package projeto.setran.computerscience.com.br.setranprojeto;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.ProgressDialog;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONArray;

import java.util.ArrayList;
import java.util.List;

import projeto.setran.computerscience.com.br.setranprojeto.Util.GridSpacingItemDecoration;
import projeto.setran.computerscience.com.br.setranprojeto.Util.Util;
import projeto.setran.computerscience.com.br.setranprojeto.adapter.NoticiasAdapter;
import projeto.setran.computerscience.com.br.setranprojeto.app.AppController;
import projeto.setran.computerscience.com.br.setranprojeto.domain.Noticia;

public class MainActivity extends AppCompatActivity {

    private RecyclerView recyclerView;
    private NoticiasAdapter adapter;
    private List<Noticia> noticiaList;
    private Activity activity;

    private static final String TAG = MainActivity.class.getSimpleName();
    private static final String URL_NOTICIA = "https://setran.marcelodanielbrasil.com.br/noticias/auth/Y2hLa0VCT0N5MkRNZXpkYzBrSy92aWs9/all";
    private ProgressDialog pDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                prepareListaNoticia();
            }
        });

        /**
         * Código desenvolvido
         * */
        activity = this;
        recyclerView = (RecyclerView) findViewById(R.id.recycler_view);
        noticiaList = new ArrayList<>();
        adapter = new NoticiasAdapter(this, noticiaList, activity);

        RecyclerView.LayoutManager mLayoutManager = new GridLayoutManager(this, 2);
        recyclerView.setLayoutManager(mLayoutManager);
        recyclerView.addItemDecoration(new GridSpacingItemDecoration(2, Util.dpToPx(10, getResources()), true));
        recyclerView.setItemAnimator(new DefaultItemAnimator());
        recyclerView.setAdapter(adapter);

        prepareListaNoticia();
    }


    private boolean prepareListaNoticia() {

        final boolean[] r = new boolean[1];

        pDialog = new ProgressDialog(MainActivity.this);
        pDialog.setMessage("Por favor Aguarde...");
        pDialog.setIndeterminate(false);
        pDialog.setCancelable(true);
        pDialog.show();

        JsonArrayRequest request = new JsonArrayRequest(URL_NOTICIA,
                new Response.Listener<JSONArray>() {
                    @SuppressLint("SetTextI18n")
                    @Override
                    public void onResponse(JSONArray response) {
                        if (response == null) {
                            //   Toast.makeText(getApplicationContext(), "Couldn't fetch the store items! Pleas try again.", Toast.LENGTH_LONG).show();
                            return;
                        }

                        List<Noticia> items =
                                new Gson().fromJson(response.toString(), new TypeToken<List<Noticia>>() {}.getType());

                        noticiaList.clear();
                        noticiaList.addAll(items);
                        adapter.notifyDataSetChanged();
                        pDialog.dismiss();
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "Error: " + error.getMessage());
            }
        });

        AppController.getInstance().addToRequestQueue(request);

        return r[0];
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
