<?php

class LanguageRules extends BaseRules{

    public static $rules = [
      //'id'
        'language' => 'required|unique:languages',
      //'phonetic' // null
        'language_code' => 'required|size:3|unique:languages'
      //'country_of_origin' // null
      //'alternate_languages_json' // null
      //'deleted_at'
      //'created_at'
      //'updated_at'
    ];
}