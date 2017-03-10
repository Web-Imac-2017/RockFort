<template>
  <div>
    <NavComponent></NavComponent>
    <div>

      <div class="body col-md-10 col-md-offset-2">
        <h1 id="welcome">Bienvenue, Qaurantain !</h1>

        <h2 class="midtitle">État des stocks :</h2>

        <div class="stockbutton col-md-4">
          <button type="button" class="btn btn-default">Albums</button>
        </div>

        <div class="stockbutton col-md-4">
          <button type="button" class="btn btn-default">Platines</button>
        </div>

        <div class="stockbutton col-md-4">
          <button type="button" class="btn btn-default">Coffrets</button>
        </div>

      </div>
      
    </div>
  </div>
</template>

<script>
  import NavComponent from './Nav.vue'

  export default {
    components: {
      NavComponent
    }
  }
</script>