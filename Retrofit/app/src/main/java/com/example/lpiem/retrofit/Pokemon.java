package com.example.lpiem.retrofit;
import java.util.List;
import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;


    public class Pokemon {


        @SerializedName("count")
        @Expose
        private Integer count;
        @SerializedName("next")
        @Expose
        private Object next;
        @SerializedName("previous")
        @Expose
        private Object previous;
        @SerializedName("results")
        @Expose
        private List<Result> results = null;

        public Integer getCount() {
            return count;
        }

        public void setCount(Integer count) {
            this.count = count;
        }

        public Object getNext() {
            return next;
        }

        public void setNext(Object next) {
            this.next = next;
        }

        public Object getPrevious() {
            return previous;
        }

        public void setPrevious(Object previous) {
            this.previous = previous;
        }

        public List<Result> getResults() {
            return results;
        }

        public void setResults(List<Result> results) {
            this.results = results;
        }



































     /*   @SerializedName("nom")
        private String nom;
        @SerializedName("url")
        private String url;


        public Pokemon(String nom, String url) {
            this.nom = nom;
            this.url = url;
        }
        public String getName() {
            return nom;
        }

        public void setName(String name) {
            this.nom = name;
        }

        public String getUrl() {
            return url;
        }

        public void setUrl(String url) {
            this.url = url;
        }*/

    }



