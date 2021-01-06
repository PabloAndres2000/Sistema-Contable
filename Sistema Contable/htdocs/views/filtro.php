<div class="container">
	<div class="row">
		<h2>Create your snippet's HTML, CSS and Javascript in the editor tabs</h2>
		
		<div class="col-md-12">
		    <form class="form-inline form-filtro">
        <div class="form-group">
          <label class="sr-only" for="filtro-data-inicial">Data inicial</label>
          <input type="date" class="form-control" id="filtro-data-inicial">
        </div>
        <div class="form-group">
          <label class="sr-only" for="filtro-data-final">Data final</label>
          <input type="date" class="form-control" id="filtro-data-final">
        </div>
        <div class="form-group">
          <label class="sr-only" for="filtro-tipo">Tipo</label>
          <select class="form-control" id="filtro-tipo">
            <option value="">Tipo</option>
            <option value="">Receita</option>
            <option value="">Despesa</option>
          </select>
        </div>
        <div class="form-group">
          <label class="sr-only" for="filtro-conta">Conta</label>
          <select class="form-control" id="filtro-conta">
            <option value="">Conta</option>
          </select>
        </div>
        <div class="form-group">
          <label class="sr-only" for="filtro-categoria">Categoria</label>
          <select class="form-control" id="filtro-categoria">
            <option value="">Categoria</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Filtrar</button>
          <button type="reset" class="btn btn-default">Limpar</button>
        </div>
      </form>
		</div>
	</div>
</div>