<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'confirmed' => 'განმეორებითი :attribute არ ემთხვევა ახალ ფასვორდს.',


    'date_format' => ':attribute უნდა ემთხვეოდეს ფასვორდის ფორმატს.',

    'exists' => 'აღნინშნული :attribute არ არის ვალიდური',


    'min' => [

        'numeric' => ':attribute უნდა იყოს მინიმუმ :min.',
        'string' => ':attribute უნდა იყოს მინიმუმ :min ნიშნიანი.',
    ],

    'required' => ':attribute სავალდებულოა.',
    'same' => ':attribute არ ემთხვევა ახალ ფასვორდს.',
    'size' => [
        'string' => ':attribute უნდა იყოს მინიმუმ :size.',
    ],
    'unique' => 'ასეთი :attribute უკვე არსებობს.',


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => ['password' => "ფასვორდი" , 'name' => "სახელი", 'password_confirmation' => 'განმეორებითი ფასვორდი', 'email' => 'ელ ფოსტა'],

];
