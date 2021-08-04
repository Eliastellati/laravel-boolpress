<template>
        <div class="col-4 my-3 d-flex">
          <div class="card w-100">
              <div class="card-body">
                  <h5 class="card-title">{{ posts.title }}</h5>
                  <p>{{  posts.excerpt }}</p>
              </div>
              <a href="#" class="card-link">Leggi</a>
          </div>
        </div>
</template>

<script>
export default {
name: 'Card',
props: {'item': Object}
}
</script>

<style>

</style>