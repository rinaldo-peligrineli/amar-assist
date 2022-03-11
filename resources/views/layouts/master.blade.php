<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.3.6.0.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/form-validations.js') }}"></script>

<!-- Modal para mensagem de criacao, alteracao e exclusao de registro -->
<div id="modal-msg-info" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="icon fa fa-success"></i> AVISO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="txt-info">&nbsp;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary alert-confirm" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div> 

<!-- Modal para Cadastrar Telefone -->
<div id="modal-add-telefone" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="icon fa fa-success"></i> AVISO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <input type="hidden" name="idContato" id="idContato" value="">
        <label for="tipoTelefone">Tipo Telefone</label>
        <select class="form-control" name="tipo_telefone_id" id="tipo_telefone_id">
            <option value="">Selecione</option>
              @if(isset($objTipoTelefone))
                  @foreach($objTipoTelefone as $objDado)
                      <option value="{{$objDado->id}}"> {{$objDado->descricao_tipo}}</option>
                      
                  @endforeach
              @endif    
        </select>
        
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" onClick="cadastrarNovoTelefone()" class="btn btn-success" data-dismiss="modal">Incluir</button>
        <button type="button" onClick="redirect()" class="btn btn-secondary alert-confirm" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Cadastrar Email -->
<div id="modal-add-email" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="icon fa fa-success"></i> AVISO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <input type="text" name="idContatoEmail" id="idContatoEmail" value="">
        <div class="form-group">
            <label for="telefone">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" onClick="cadastrarNovoEmail()" class="btn btn-success" data-dismiss="modal">Incluir</button>
        <button type="button" class="btn btn-secondary alert-confirm" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>