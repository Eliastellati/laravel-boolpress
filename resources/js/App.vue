<template>
<div class="container">
<Header />
 <main>
     <h1>Il Mio Blog</h1>
      <div class="row">
          <div 
            class="col-4 my-3 d-flex"
            v-for="post in posts"
            :key="post.id"
          >
          <div class="card w-100">
              <div class="card-body">
                  <h5 class="card-title">{{ post.title }}</h5>
                  <p>{{  truncateText(post.content, 200) }}</p>
              </div>
              <a href="#" class="card-link">Leggi</a>
          </div>
          </div>
      </div>
 </main>
 <Footer />
</div>
</template>

<script>
// import WorkInProgress from './components/WorkInProgress';
import Header from './components/Header';
import Footer from './components/Footer';
export default {
name: 'App',
data: function() {
    return {
        posts: []
    }
},
components: {
    Header,
    Footer
},
methods: {
    truncateText: function(string, charsNumber) {
        if(string.length>charsNumber) {
            return string.substr(0, charsNumber) + '...';
        }else {
            return string
        }
    }
},
created: function() {
    axios
      .get('http://127.0.0.1:8000/api/posts')
      .then(
          res=>{
              console.log(res.data);
              this.posts=res.data.posts;
          }
      )
      .catch(
          err=>{
              console.log(err);
          }
      )
}

}
</script>

<style lang="scss">
@import '../sass/front.scss';
</style>