<section class="main-header-logo main-header-logo--small wrapper">
    <h1 class="main-header__title">Седона</h1>
    <img class="main-header__end" src="../../../public/img/intro-triangle.svg.png" alt="">
</section>
<section class="section-form wrapper">
    <form method="post" class="section-form__container">
        <h2 class="section-form__title">Регистрация</h2>
        <p class="section-form__text">Заполните поля для создания аккаунта</p>
        <div class="section-form__flex-container">
            <div class="section-form__type">
                <h3 class="section-form__type-title">Ваш опыт путешествий:</h3>
                <div class="section-form__radio">
                    <input type="radio" id="rbtn1" name="rbtn" value="Достаточный">
                    <label for="rbtn1">Достаточный</label>
                </div>
                <div class="section-form__radio">
                    <input type="radio" id="rbtn2" name="rbtn" value="Средний" checked>
                    <label for="rbtn2">Средний</label>
                </div>
                <div class="section-form__radio">
                    <input type="radio" id="rbtn3" name="rbtn" value="Новичек">
                    <label for="rbtn3">Новичек</label>
                </div>
            </div>
            <div class="section-form__user-info">
                <h3 class="section-form__user-info-title">
                    Представьтесь:
                </h3>
                <div class="section-form__input">
                    <label for="inp1">Имя*:</label>
                    <input type="text" id="inp1" class="required" placeholder="Ваше имя" name="name" required>
                </div>
                <div class="section-form__input">
                    <label for="inp3">Логин*:</label>
                    <input type="text" id="inp3" placeholder="Ваш логин" name="login" required>
                </div>
                <div class="section-form__input">
                    <label for="inp2">Пароль*:</label>
                    <input type="password" id="inp2" placeholder="Ваш пароль" name="pass" required>
                </div>
            </div>
        </div>
        <h3 class="section-form__contact-title">Контактная информация:</h3>
        <div class="section-form__contact">
            <div class="section-form__contact-item section-form__contact-item--tel">
                <label for="">Телефон*:</label>
                <input type="tel" placeholder="Введите телефон" name="phone" id="phone" required>
            </div>
            <div class="section-form__contact-item section-form__contact-item--email">
                <label for="">Электронная почта*:</label>
                <input type="text" placeholder="Введите e-mail" name="email" required>
            </div>
        </div>
        <h3 class="section-form__places-title">Цели путешествия</h3>
        <div class="section-form__places">
            <div class="section-form__places-item">
                <input type="checkbox" id="cbtn1" name="cbtn1" value="Отдых">
                <label for="cbtn1">Отдых</label>
            </div>
            <div class="section-form__places-item">
                <input type="checkbox" id="cbtn2" name="cbtn2" value="Просмотр достопримечательностей">
                <label for="cbtn2">Просмотр достопримечательностей</label>
            </div>
            <div class="section-form__places-item">
                <input type="checkbox" id="cbtn3" name="cbtn3" value="Общение">
                <label for="cbtn3">Общение</label>
            </div>
            <div class="section-form__places-item">
                <input type="checkbox" id="cbtn4" name="cbtn4" value="Выезд за границу">
                <label for="cbtn4">Выезд за границу</label>
            </div>
        </div>
        <h3 class="section-form__review">Опишите как вы нашли нас:</h3>
        <textarea class="section-form__review-form" maxlength="500" placeholder="Опишите подробно как вы нас нашли" name="desk"></textarea>
        <div class="section-form__review-flex">
            <button class="btn section-form__review-send">Зарегистрироваться</button>
            <p class="section-form__review-warning">* — обязательные поля</p>
        </div>
    </form>
</section>