<script src="js/contracto/update.js"></script>

<br/>
<rigth>
    &nbsp;&nbsp; 
    <a href="contracto" class="button special icon fa-download">NUEVO REGISTRO</a>
    <a href="contractoList" class="button special icon fa-search">LISTADO</a>
</rigth>
<CENTER>   

    <h1>ACTUALIZAR CONTRACTO</h1><h2 id='lblId'></h2>


    <form action="controller/contracto_c.php" method="post"  id="frmContracto" name = "frmContracto">


        <input id="txtProcess" name="txtProcess" value="3" hidden>

        <label id="error">
        </label>

        <div class='6u$ 12u$(xsmall)'> 

            <input name="txtIdC" id="txtIdC" type="text" hidden/>
              
            <br/>
            <div class="input-group input-group-sm">

                <span class="input-group-addon" >DEPENDENCIA :</span>
                <div class="6u$ 12u$(xsmall)" name="divDepend"  id="divDepend"> </div>

                <span class="input-group-addon" >SECCION :</span>
                <input name="txtSeccion" id="txtSeccion" type="text" />

            </div>
            <br/>
            <div class="input-group input-group-sm">

                <span class="input-group-addon" >MOD. SELECCION :</span>
                <div class="6u$ 12u$(xsmall)" name="divMSelecc"  id="divMSelecc"> </div>
                <span class="input-group-addon" >CAUSAL :</span>
                <div class="6u$ 12u$(xsmall)" name="divCausal"  id="divCausal"> </div>
            </div>  
            <br/>
            <div class="input-group input-group-sm">

                <span class="input-group-addon" >TIPO CONTRACTO:</span>
                <div class="6u$ 12u$(xsmall)" name="divTContract"  id="divTContract"> </div>
                <span class="input-group-addon" >TIPO GASTO :</span>
                <div class="6u$ 12u$(xsmall)" name="divGasto"  id="divGasto"> </div>
            </div>  

            <br/>      
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >F. SUSCRIPCION :</span>
                <input type="text" name="dtSuscripcion" id="dtSuscripcion" class="form-control" placeholder=" 0000-00-00 "/>        
                <span class="input-group-addon" >F. INCIO CONTRACT:</span>
                <input name="dtInicio" id="dtInicio" type="text" class="form-control" placeholder=" 0000-00-00 "/>
            </div>                

            <br/>

            <div class="input-group input-group-sm">
                <span class="input-group-addon" >F. TERMINACION:</span>
                <input type="text" name="dtTerminacion" id="dtTerminacion" class="form-control" placeholder="  0000-00-00 "/>          
                <span class="input-group-addon" >PLAZO EJECUCION:</span>
                <input name="txtPlazoEj" id="txtPlazoEj" type="text" class="form-control" />
            </div>                
            <br/>
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >OBJETO:</span>
                <textarea id="txtObject" name="txtObject" class="form-control" placeholder=" - Max 256 Caracteres -" ></textarea>
            </div>                
            <br/>
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >RESOLUCION ADJUDICACION:</span>
                <input type="text" name="txtResAdjudicacion" id="txtResAdjudicacion" class="form-control" placeholder=" - Resolucion Adjudicacion -"/>          
                <span class="input-group-addon" >F. ADJUDICACION:</span>
                <input name="dtAdjudicacion" id="dtAdjudicacion" type="text" class="form-control" placeholder=" 0000-00-00 "/>
            </div>  
            <br/>
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >VAOLOR INICIAL:</span>
                <input name="txtValorIni" id="txtValorIni" type="text" class="form-control" placeholder=""/>
            </div>    
            <br/>
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >PACTO ANTICIPO:</span>
                <select id="cmbPactoAnticp" name="cmbPactoAnticp">
                        <option value="">- Seleccionar -</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>          
                <span class="input-group-addon input-group-sm" >VALOR ANTICIPO:</span>
                <input name="txtValorAnticp" id="txtValorAnticp" type="text" />
            </div> 
            <br/>
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >PUBLICO EN SECOP:</span>
                <select id="cmbPublicSecop" name="cmbPublicSecop">
                    <option value="">- Seleccionar -</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>          
                <span class="input-group-addon" >F. PUBLICACION SECOP:</span>
                <input name="dtPublicSecop" id="dtPublicSecop" type="text"  placeholder=" 0000-00-00 "/>
            </div> 
            <br/>
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >ACTUALIZO EN SECOP:</span>

                <select id="cmbActSecop" name="cmbActSecop">
                    <option value="">- Seleccionar -</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>          
                <span class="input-group-addon" >F. ACTUALIZACION SECOP:</span>
                <input name="dtActSecop" id="dtActSecop" type="text"  placeholder=" 0000-00-00 "/>
            </div> 
            <br/>
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >LINK SECOP:</span>
                <input type="text" name="txtLinkSecop" id="txtLinkSecop" placeholder=" www.secop.gov.co/..."/>          
                <span class="input-group-addon" >CONSTITUYO FIDUCIA:</span>
                <select id="cmbFiducia" name="cmbFiducia">
                    <option value="">- Seleccionar -</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>                    
            </div> 
            <br/>
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >OBSERVACIONES:</span>
                <textarea id="txtObserv" name="txtObserv" class="form-control" placeholder=" - Max 256 Caracteres -" ></textarea>
            </div> 
            <br/>
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >AFECTA PRESUPUESTO:</span>
                <select id="cmbAfecTaPresupt" name="cmbAfecTaPresupt">
                    <option value="">- Seleccionar -</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>                    
               <span class="input-group-addon" >TIPO DE RECURSOS:</span>
                <div class="6u$ 12u$(xsmall)" name="divTRecurs"  id="divTRecurs"> </div>
            </div> 
            <br/>
            <div class="input-group input-group-sm">                  
               <span class="input-group-addon" >TIPO DE LIQUIDACION:</span>
                <div class="6u$ 12u$(xsmall)" name="divTLiquid"  id="divTLiquid"> </div>
               <span class="input-group-addon" >DOCUMENTO DE LIQUIDACION:</span>
                <input name="txtDocLiquid" id="txtDocLiquid" type="text"  />
            </div> 
            <br/>
             <div class="input-group input-group-sm">                  
               <span class="input-group-addon" >F. LIQUIDACION:</span>
                <input name="dtLiquid" id="dtLiquid" type="text" />
               <span class="input-group-addon" >CODIGO FUNCION:</span>
                <div class="6u$ 12u$(xsmall)" name="divFuncion"  id="divFuncion"> </div>
            </div> 
            <br/>
            <div class="input-group input-group-sm">                  
               <span class="input-group-addon" >EJE:</span>
                <input name="txtEje" id="txtEje" type="text"  />
               <span class="input-group-addon" >EST:</span>
                <input name="txtEst" id="txtEst" type="text" />
            </div> 
            <br/>
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >PROG:</span>
                <input name="txtProg" id="txtProg" type="text" />
            </div> 
            <br/>
            <div class="input-group input-group-sm">
                <span class="input-group-addon" >SEGMENTO DEL SERVICIO:</span>
                <textarea id="txtSegment" name="txtSegment" class="form-control" placeholder=" - Max 256 Caracteres -" ></textarea>
            </div> 
            <br/>
            <input type="button" id="btnIngresar" name="btnIngresar" value="REGISTRAR" class="button " />
            <input type="reset" id="btnIngresar" name="btnIngresar" value="LIMPIAR" class="button " />

        </div>

    </form>

</CENTER>

