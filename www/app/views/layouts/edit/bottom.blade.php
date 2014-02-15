                        <footer>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Salvar </button>
                            <a class="btn btn-default" href="{{ URL::to($cancel_route.'/') }}"><i class="fa fa-arrow-circle-o-left"></i> Cancelar</a>
                        </footer>
                        {{ Form::close() }}
                    </div>
                    {{-- end widget content --}}
                </div>
            </div>
        </article>
        {{-- end Widget --}}
    </div>
    {{-- end row --}}
</section>