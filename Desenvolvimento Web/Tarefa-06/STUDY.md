## Documentação de funções úteis do PHP

> **Por que esta documentação?**
> 
> Estou começando com PHP e tenho dificuldade para lembrar os nomes não convencionais de funções padrão da linguagem. Esta documentação básica visa explicar funcionalidades interessantes para ajudar tanto a mim quanto aos meus colegas no aprendizado.

## Strings

**explode**  
Uma função que divide uma string em um array usando um separador específico, equivalente ao `split` em Kotlin.

```php
explode(string $separator, string $string): string

// Exemplo:
explode('-', 'a-b-c'); // ['a', 'b', 'c']
```

**implode**  
Uma função que une um array de elementos em uma única string usando um separador, equivalente ao `join` em Kotlin.

```php
implode(string $separator, array $array): string

// Exemplo:
implode('-', ['a', 'b', 'c']); // a-b-c
```

**strtr**
Substitui carácteres ou substrings em uma string, conforme o mapeamento fornecido.

```php
strtr(string $string, string $from, string $to): string
strtr(string $string, array $replace_pairs): string

strtr('abc', 'abc', '123'); // 123
strtr('Olá mundo!', ['Olá' => 'Hello', 'mundo' => 'world']); // Hello world!
strtr('a+b/c=', '+/', '-_'); // a-b_c=
```

## Arrays

**list**
Atribui valores de um array a variáveis individuais, semelhante ao `destructuring` em Kotlin.

```php
list($var1, $var2, $var3, ...): void;
list(array $array): void

// Exemplo:
list($a, $b, $c) = ['x', 'y', 'z']; // $a = 'x', $b = 'y', $c = 'z'
```

## JWT

> **Mas por que? Não é overkill?**
> 
> Certamente, mas eu gosto de inventar moda. Tirando que, por eu não ter acesso a algo como Redis, é a melhor escolha se eu quiser escalar a aplicação horizontamente.

**Mas o que é JWT?**
 
* JSON Web Token (JWT) é uma forma compácta de transmitir informações seguras entre partes. Aqui eu uso como uma forma de autenticação independente de estado, ou seja, eu não preciso armazenar, consigo programáticamente descobrir se o token é válido ou não.

* JWT é composto por três partes: Header, Payload e Signature. 
    * O Header contem inforações necessárias para depois decodificar o token.
    * O Payload contém as informações que eu quero transmitir, como o ID do usuário.
    * A Signature é uma assinatura criptográfica que garante a integridade do token.