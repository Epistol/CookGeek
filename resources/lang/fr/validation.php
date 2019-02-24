<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain default error messages used by
    | validator class. Some of these rules have multiple versions such
    | as size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepté'              => ':attribute doit être accepté.',
    'active_url'           => ':attribute n\'est pas une URL valide.',
    'after'                => ':attribute doit être une date supérieure à :date.',
    'after_or_equal'       => ':attribute doit être une date supérieure ou égale à :date.',
    'alpha'                => ':attribute ne peut contenir que des lettres.',
    'alpha_dash'           => ':attribute ne peut contenir que des lettres, nombres, et dashes.',
    'alpha_num'            => ':attribute ne peut contenir que des lettres et nombres.',
    'array'                => ':attribute doit être un tableau.',
    'before'               => ':attribute doit être une date antérieure à :date.',
    'before_or_equal'      => ':attribute doit être une date antérieure ou égale à :date.',
    'between'              => [
        'numeric' => ':attribute doit être entre :min et :max.',
        'file'    => ':attribute doit être entre :min et :max kilobytes.',
        'string'  => ':attribute doit être entre :min et :max characters.',
        'array'   => ':attribute must have entre :min et :max items.',
    ],
    'boolean'              => ':attribute champ doit être true or false.',
    'confirmed'            => ':attribute confirmation ne correspond pas.',
    'date'                 => ':attribute n\'est pas une date valide.',
    'date_format'          => ':attribute ne correspond pas format :format.',
    'different'            => ':attribute et :other doivent être different.',
    'digits'               => ':attribute doit être :digits digits.',
    'digits_between'       => ':attribute doit être entre :min et :max digits.',
    'dimensions'           => ':attribute a des dimensions d\'image non valides.',
    'distinct'             => ':attribute champ a une valeur en double.',
    'email'                => ':attribute doit être une adresse email valide.',
    'exists'               => 'selected :attribute est invalide.',
    'file'                 => ':attribute doit être un fichier.',
    'filled'               => ':attribute champ doit avoir une valeur.',
    'image'                => ':attribute doit être une image.',
    'in'                   => 'selected :attribute est invalide.',
    'in_array'             => ':attribute champ n\'existe pas in :other.',
    'integer'              => ':attribute doit être un nombre entier.',
    'ip'                   => ':attribute doit être une adresse IP valide.',
    'ipv4'                 => ':attribute doit être une adresse IPv4 valide.',
    'ipv6'                 => ':attribute doit être une adresse IPv6 valide.',
    'json'                 => ':attribute doit être une chaîne JSON valide.',
    'max'                  => [
        'numeric' => ':attribute ne peut être plus grand que :max.',
        'file'    => ':attribute ne peut être plus grand que :max kilobytes.',
        'string'  => ':attribute ne peut être plus grand que :max caractères.',
        'array'   => ':attribute peut ne pas avoir plus de :max objets.',
    ],
    'mimes'                => ':attribute doit être un fichier de type: :values.',
    'mimetypes'            => ':attribute doit être un fichier de type: :values.',
    'min'                  => [
        'numeric' => ':attribute doit être au moins :min.',
        'file'    => ':attribute doit être au moins :min kilobytes.',
        'string'  => ':attribute doit être au moins :min characters.',
        'array'   => ':attribute must have au moins :min items.',
    ],
    'not_in'               => 'L\'attribut choisi  :attribute est invalide.',
    'numeric'              => 'Le champ :attribute doit être un nombre.',
    'present'              => 'Le champ :attribute doit être présent.',
    'regex'                => ':attribute = format est invalide.',
    'required'             => 'Le champ :attribute est requis.',
    'required_if'          => 'Le champ :attribute est requis quand :other est :value.',
    'required_unless'      => 'Le champ :attribute est requis à moins que :other est présent dans :values.',
    'required_with'        => 'Le champ :attribute est requis quand :values est présent.',
    'required_with_all'    => 'Le champ :attribute est requis quand :values est présent.',
    'required_without'     => 'Le champ :attribute est requis quand :values n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est requis quand aucune des valeurs n\'est présente = :values .',
    'same'                 => ':attribute et :other doivent correspondre.',
    'size'                 => [
        'numeric' => ':attribute doit être :size.',
        'file'    => ':attribute doit être de :size kilobytes.',
        'string'  => ':attribute doit être de :size characters.',
        'array'   => ':attribute doit contenir :size objets.',
    ],
    'string'               => ':attribute doit être une chaîne de caractères.',
    'timezone'             => ':attribute doit être une zone temporelle valide.',
    'unique'               => 'L\' :attribute a déjà été pris.',
    'uploaded'             => 'Échec de l\'envoi de :attribute .',
    'url'                  => 'Le format de :attribute est invalide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail adresse instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
