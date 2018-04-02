package projeto.setran.computerscience.com.br.setranprojeto.domain;

/**
 * Created by Marcelo Daniel on 02/04/2018.
 */

public class Noticia {

    String id;
    String titulo;
    String subtitulo;
    String conteudo;
    String url;
    String autor;
    String at_created;
    String at_updated;
    String categoria;
    String imagem;

    public Noticia() {

    }

    public Noticia(String id, String titulo, String subtitulo, String conteudo, String url, String autor, String at_created, String at_updated, String categoria, String imagem) {
        this.id = id;
        this.titulo = titulo;
        this.subtitulo = subtitulo;
        this.conteudo = conteudo;
        this.url = url;
        this.autor = autor;
        this.at_created = at_created;
        this.at_updated = at_updated;
        this.categoria = categoria;
        this.imagem = imagem;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getTitulo() {
        return titulo;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public String getSubtitulo() {
        return subtitulo;
    }

    public void setSubtitulo(String subtitulo) {
        this.subtitulo = subtitulo;
    }

    public String getConteudo() {
        return conteudo;
    }

    public void setConteudo(String conteudo) {
        this.conteudo = conteudo;
    }

    public String getUrl() {
        return url;
    }

    public void setUrl(String url) {
        this.url = url;
    }

    public String getAutor() {
        return autor;
    }

    public void setAutor(String autor) {
        this.autor = autor;
    }

    public String getAt_created() {
        return at_created;
    }

    public void setAt_created(String at_created) {
        this.at_created = at_created;
    }

    public String getAt_updated() {
        return at_updated;
    }

    public void setAt_updated(String at_updated) {
        this.at_updated = at_updated;
    }

    public String getCategoria() {
        return categoria;
    }

    public void setCategoria(String categoria) {
        this.categoria = categoria;
    }

    public String getImagem() {
        return imagem;
    }

    public void setImagem(String imagem) {
        this.imagem = imagem;
    }
}
