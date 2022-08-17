<!-- Send Review -->

<div class="content">

  <div class="row">

    <div class="col-lg-6">

      <h5 class="mb-3">Ваш отзыв</h5>
      <form>

        <div class="form-row">
          <div class="col">
            <div class="form-group">
              <label for="name">Имя</label>
              <input type="text"
                id="name"
                name="name"
                class="form-control"
                maxlength="30"
                placeholder="Имя"
                required="required"
                autocomplete="off">
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col">
            <div class="form-group">
              <label for="review">Отзыв</label>
              <textarea type="text"
                id="review"
                name="review"
                class="form-control"
                maxlength="220"
                placeholder="Ваш отзыв"
                required="required" rows="5"
                autocomplete="off"></textarea>
            </div>
          </div>
        </div>

        <div class="mt-4">
            <button class="btn-default btn-review">Отправить</button>
        </div>

      </form>

      <div class="form-errors">

        <span class="name-empty form-error">Нужно заполнить поле 'Имя'</span>
        <span class="review-empty form-error">Нужно заполнить поле 'Отзыв'</span>
        <span class="many-reviews form-error">Можно отправить только 3 отзыва.</span>
        <span class="name-too-long form-error">Имя должно быть не более 25 символов.</span>
        <span class="review-too-long form-error">Отзыв должен быть не более 200 символов.</span>
        <span class="wrong form-error">Что-то пошло не так...</span>

      </div>

    </div>

    <div class="col-lg-6">

      <h5 class="mb-4 mt-1 px-3">Отзывы</h5>

      <div id="reviews">

          <?php

          // Show reviews if there are any
          if ($data->rowCount()) {

              while ($row = $data->fetch(PDO::FETCH_OBJ)) {
          ?>
                  <div class="review-cart break-words">

                      <span class="review-author"><?=$row->name?> | </span>
                      <span class="review-author-date"><?=$row->date?></span>

                      <p class="text-break"><?=$row->message?></p>

                  </div>

          <?php }

          } else {
              echo "<div class='no-reviews'>Нет отзывов</div>";
          }

          ?>

      </div>

      <div class="mt-4 text-end">
          <button class="btn-default btn-delete-review me-3 px-5">Удалить отзывы</button>
      </div>

    </div>
  </div>
</div>

<?php
    if ($data->rowCount()) {
        echo "<script>$('.btn-delete-review').fadeTo(300, 1);</script>";
    }
?>
