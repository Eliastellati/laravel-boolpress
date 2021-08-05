<template>
  <header>
      <div class="container">
          <ul>
              <li>
                  <router-link to="/">Home</router-link>
              </li>
              <li>
                  <router-link to="/blog">Blog</router-link>
              </li>
              <li>
                  <router-link to="/about">Chi Siamo</router-link>
              </li>
          </ul>
      </div>
  </header>
</template>

<script>
export default {
name: 'Header'
}
</script>

<style lang="scss" scoped>
header {
    text-align: center;
    margin-top: 30px;

    li {
        display: inline-block;

        a {
            display: inline-block;
            padding: 5px 10px;
            color: black;
            font-size:18px;
            text-decoration: none;

            &.active,
            &:hover {
                background: teal;
                color: white;
            }
        }
    }
}

</style>