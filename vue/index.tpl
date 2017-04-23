{if isset($connecte) and $connecte == true}
  <p>
    <div class="row">
      <!--affichage du div pour envoiyer a la base (lesmessage "contenu")-->
      <form method="post"
      {if isset($linkId) and $linkId=='false'}
        action="message.php"
      {/if}>
          <div class="col-sm-10">
              <div class="form-group">
                  <textarea id="message" name="message" class="form-control" placeholder="Message">{if isset($tab)}{$tab}{/if}</textarea>
              </div>
          </div>
          <div class="col-sm-2">
              <button type="submit" class="btn btn-success btn-lg">
                  <!-- differenciation de l'envoi-->
                {if isset($linkId) and $linkId=='false'}
                  Envoyer
                {else}
                  Modifier
                {/if}
              </button>
          </div>
      </form>
    </div>
  </p>
{/if}
{if isset($lesContenus) and !empty($lesContenus)}
  <!-- 1er boucle pour les elements de la base -->
  {foreach key=IdTab from=$lesContenus  item=con }
    <!-- affichage de la base-->
    <blockquote>
      <b>{$con}</b> , <i>auteur : </i> {$con} <br>le : {$con|date_format:"%A, %B %e, %Y"}

      <!-- Si user connecte alors on afficher les boutons de suppression de modification !-->
      {if isset($connecte) and $connecte==1}
          <a href="index.php?idDel={$IdTab+1}" class="bout"><button class="btn btn-danger btn-sm">Del</button></a>
          <a href="index.php?id={$IdTab+1}" class="bout"><button class="btn btn-default btn-sm">Edit</button></a>
      {/if}
    </blockquote>
  {foreachelse}
    Aucun élément n'a été trouvé dans la recherche
  {/foreach}
{/if}

<!-- pagination -->
<div id="pagination">
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <li>
        <a href="index.php?page={$prec}" aria-label="prec">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      {for $page=1 to $pagination}
        <li><a href="index.php?page={$page}">{$page}</a></li>
      {/for}
      <li>
        <a href="index.php?page={$suiv}" aria-label="suiv">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</div>
