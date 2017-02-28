<div class="row">              
    <form method="post" action="message.php"><?php if (isset($_COOKIE['psudo'])){ ?>
        <div class="col-sm-10">  
            <div class="form-group">
               
                <textarea id="message" name="message" class="form-control"
				placeholder="Message"><?php if (isset($message)) { echo $var['contenu']; } ?></textarea>
            </div>
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
        </div>                        
    </form><?php } ?>
</div>