CallMe - форма обратного звонка
===============================
Configuration
---
**mail.php[3]**  - change email

**in HTML code** - change **data-handler** to own script if need it.

You can set you own handlers.  Respons is json with format
```
{r:false/true,message:'Error or success message'}

```

Header
--
```html
<link rel="stylesheet" type="text/css" href="css/callme.css">
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/callme.js"></script>
```

HTML
-----------
Link Code. **data-target** and **id** of div with class **.modal.fade** is equals.
```html
<a href="#" data-toggle="modal" data-target="#callMe">Call Me Please</a>
```

Dialog and form code
```html
<div class='pcallme-form' data-handler="mail.php">
<div class="modal fade" id="callMe" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Заказать обратный звонок</h4>
      </div>
      <div class="modal-body">
        <p>Закажите обратный звонок, и мы вам перезвоним в ближайщее время!</p>
        <form role="form" class='pcallme-form--form'>
		  <div class="form-group">
		    <label for="callmePhone">Ваш телефон <span>*</span></label>
		    <input type="text" name='telephone' class="form-control" id="callmePhone" placeholder="Контактный номер телефона">
		  </div>
		  <div class="form-group">
		    <label for="callmeName">Как вас зовут? <span>*</span></label>
		    <input type="text" name='name' class="form-control" id="callmeName" placeholder="Представьтесь пожалуйста">
		  </div>
		  <div class="form-group">
		    <label for="callmeName">Комментарий / вопрос</label>
		    <textarea class="form-control" name='comment' rows="3"></textarea>
		  </div>
		</form>
      </div>
      <div class="modal-footer"> 
      	<div class='call-form--status'>
      		
      	</div>       
        <button type="button" class="btn btn-primary call-form--submit">Заказать звонок</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
```