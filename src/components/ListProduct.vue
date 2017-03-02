<template>
  <div id="listProduct" >
    <div class="container-fluid storeList">
      <div id="lesDisques" class="row">
        <h1>Disques</h1>
      </div>
      <div class="row">
        <div class="sortBar mb">
          <div class="container">
            <div class="row">
              <div class="col-md-3">
                <select name="sortBy">
                  <option value="default" selected>Trier par</option>
                  <option value="date">Date de sortie</option>
                  <option value="price">Prix</option>
                  <option value="alphabet">Ordre alphabétique</option>
                </select>
              </div>
              <div class="col-md-3">
                <select name="genre">
                  <option value="default" selected>Genre</option>
                  <option value="date">Rock</option>
                  <option value="price">Prix</option>
                  <option value="alphabet">Ordre alphabétique</option>
                </select>
              </div>
              <div class="col-md-3">
                <form class="right" action="/search">
                  <input type="text" placeholder="rechercher un vinyle" />
                </form>
              </div>
              <div class="col-md-3">
                <button class="random">random</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container listContainer">
      <div class="row mbLarge">
        <div class="col-md-3">
          <div class="vinyleItem">
            <a href="#"><img src="/src/assets/imgs/AbbeyRoad.jpg" /></a>
          </div>
          <p class="vinylTitle">Abbey Road</p>
          <p class="bandName">The beatles - 1969</p>
          <div class="row">
            <div class="col-md-6">
              <div class="addToCart">
                Ajouter au panier
              </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
              <p class="price">20€</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="vinyleItem">
            <a href="#"><img src="/src/assets/imgs/AbbeyRoad.jpg" /></a>
          </div>
          <p class="vinylTitle">Abbey Road</p>
          <p class="bandName">The beatles - 1969</p>
          <div class="row">
            <div class="col-md-6">
              <div class="addToCart">
                Ajouter au panier
              </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
              <p class="price">20€</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="vinyleItem">
            <a href="#"><img src="/src/assets/imgs/AbbeyRoad.jpg" /></a>
          </div>
          <p class="vinylTitle">Abbey Road</p>
          <p class="bandName">The beatles - 1969</p>
          <div class="row">
            <div class="col-md-6">
              <div class="addToCart">
                Ajouter au panier
              </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
              <p class="price">20€</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="vinyleItem">
            <a href="#"><img src="/src/assets/imgs/AbbeyRoad.jpg" /></a>
          </div>
          <p class="vinylTitle">Abbey Road</p>
          <p class="bandName">The beatles - 1969</p>
          <div class="row">
            <div class="col-md-6">
              <div class="addToCart">
                Ajouter au panier
              </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
              <p class="price">20€</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mbLarge">
        <div class="col-md-3">
          <div class="vinyleItem">
            <a href="#"><img src="/src/assets/imgs/AbbeyRoad.jpg" /></a>
          </div>
          <p class="vinylTitle">Abbey Road</p>
          <p class="bandName">The beatles - 1969</p>
          <div class="row">
            <div class="col-md-6">
              <div class="addToCart">
                Ajouter au panier
              </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
              <p class="price">20€</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="vinyleItem">
            <a href="#"><img src="/src/assets/imgs/AbbeyRoad.jpg" /></a>
          </div>
          <p class="vinylTitle">Abbey Road</p>
          <p class="bandName">The beatles - 1969</p>
          <div class="row">
            <div class="col-md-6">
              <div class="addToCart">
                Ajouter au panier
              </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
              <p class="price">20€</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="vinyleItem">
            <a href="#"><img src="/src/assets/imgs/AbbeyRoad.jpg" /></a>
          </div>
          <p class="vinylTitle">Abbey Road</p>
          <p class="bandName">The beatles - 1969</p>
          <div class="row">
            <div class="col-md-6">
              <div class="addToCart">
                Ajouter au panier
              </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
              <p class="price">20€</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="vinyleItem">
            <a href="#"><img src="/src/assets/imgs/AbbeyRoad.jpg" /></a>
          </div>
          <p class="vinylTitle">Abbey Road</p>
          <p class="bandName">The beatles - 1969</p>
          <div class="row">
            <div class="col-md-6">
              <div class="addToCart">
                Ajouter au panier
              </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
              <p class="price">20€</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mbLarge">
        <div class="col-md-3">
          <div class="vinyleItem">
            <a href="#"><img src="/src/assets/imgs/AbbeyRoad.jpg" /></a>
          </div>
          <p class="vinylTitle">Abbey Road</p>
          <p class="bandName">The beatles - 1969</p>
          <div class="row">
            <div class="col-md-6">
              <div class="addToCart">
                Ajouter au panier
              </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
              <p class="price">20€</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="vinyleItem">
            <a href="#"><img src="/src/assets/imgs/AbbeyRoad.jpg" /></a>
          </div>
          <p class="vinylTitle">Abbey Road</p>
          <p class="bandName">The beatles - 1969</p>
          <div class="row">
            <div class="col-md-6">
              <div class="addToCart">
                Ajouter au panier
              </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
              <p class="price">20€</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="vinyleItem">
            <a href="#"><img src="/src/assets/imgs/AbbeyRoad.jpg" /></a>
          </div>
          <p class="vinylTitle">Abbey Road</p>
          <p class="bandName">The beatles - 1969</p>
          <div class="row">
            <div class="col-md-6">
              <div class="addToCart">
                Ajouter au panier
              </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
              <p class="price">20€</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="vinyleItem">
            <a href="#"><img src="/src/assets/imgs/AbbeyRoad.jpg" /></a>
          </div>
          <p class="vinylTitle">Abbey Road</p>
          <p class="bandName">The beatles - 1969</p>
          <div class="row">
            <div class="col-md-6">
              <div class="addToCart">
                Ajouter au panier
              </div>
            </div>
            <div class="col-md-4 col-md-offset-2">
              <p class="price">20€</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default{
}
</script>
