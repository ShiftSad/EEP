# Nome: Victor Rosa Lima - RA: 51346

# Tarefa: cap4

## Diretório: cap4

### Exercício 1 - media nota (./cap4/1_media_nota.c)

```c
#include <stdio.h>

void main() {
    float notas[4], media = 0;

    printf("Digite as 4 notas do aluno:\n");
    for (int i = 0; i < 4; i++) {
        printf("Nota %d: ", i + 1);
        scanf("%f", &notas[i]);
        media += notas[i];
    }
    media /= 4;

    printf("A media do aluno e: %.2f\n", media);

    if (media > 7) {
        printf("Aprovado\n");
    } 
    
    else {
        printf("Reprovado\n");
    }
}
```

### Exercício 2 - resultado nota (./cap4/2_resultado_nota.c)

```c
#include <stdio.h>

void main() {
    float notas[2], media = 0;

    printf("Digite as 2 notas do aluno:\n");
    for (int i = 0; i < 2; i++) {
        printf("Nota %d: ", i + 1);
        scanf("%f", &notas[i]);
        media += notas[i];
    }
    media /= 2;

    printf("A media do aluno e: %.2f\n", media);

    if (media > 7) {
        printf("Aprovado\n");
    } 
    
    else if (media >= 3) {
        printf("Exame\n");
    } 
    
    else {
        printf("Reprovado\n");
    }
}
```

### Exercício 3 - menor (./cap4/3_menor.c)

```c
#include <stdio.h>

void main() {
    float a, b, menor;

    printf("Digite dois numeros:\n");
    printf("Numero 1: ");
    scanf("%f", &a);
    printf("Numero 2: ");
    scanf("%f", &b);

    if (a < b) {
        menor = a;
    } else {
        menor = b;
    }

    printf("O menor numero e: %.2f\n", menor);
}
```

### Exercício 4 - maior (./cap4/4_maior.c)

```c
#include <stdio.h>

void main() {
    float a, b, maior;

    printf("Digite dois numeros:\n");
    printf("Numero 1: ");
    scanf("%f", &a);
    printf("Numero 2: ");
    scanf("%f", &b);

    if (a > b) {
        maior = a;
    } else {
        maior = b;
    }

    printf("O maior numero e: %.2f\n", maior);
}
```

### Exercício 5 - escolha (./cap4/5_escolha.c)

```c
#include <stdio.h>

int main() {
    float a, b;

    printf("Digite dois numeros:\n");
    printf("Numero 1: ");
    scanf("%f", &a);
    printf("Numero 2: ");
    scanf("%f", &b);

    int opcao;
    printf("Escolha uma opcao:\n");
    printf("1 - Média\n");
    printf("2 - Diferança\n");
    printf("3 - Produto\n");
    printf("4 - Divisão\n");

    printf("Opcao: ");
    scanf("%d", &opcao);

    if (opcao == 1) {
        printf("A media e: %.2f\n", (a + b) / 2);
    } else if (opcao == 2) {
        printf("A diferenca e: %.2f\n", a - b);
    } else if (opcao == 3) {
        printf("O produto e: %.2f\n", a * b);
    } else if (opcao == 4) {
        if (b != 0) {
            printf("A divisao e: %.2f\n", a / b);
        } else {
            printf("Divisao por zero nao e permitida.\n");
        }
    } else {
        printf("Opcao invalida.\n");
    }
}
```

### Exercício 6 - escolha2 (./cap4/6_escolha2.c)

```c
#include <stdio.h>

int main() {
    float a, b;
    int opcao;

    printf("Digite dois numeros:\n");
    printf("Numero 1: ");
    scanf("%f", &a);
    printf("Numero 2: ");
    scanf("%f", &b);

    printf("Escolha uma opcao:\n");
    printf("1 - Primeiro elevado ao segundo\n");
    printf("2 - Raiz de cada um\n");
    printf("3 - Raiz cúbica de cada um\n");

    printf("Opcao: ");
    scanf("%d", &opcao);

    switch (opcao) {
        case 1:
            printf("Resultado: %.2f\n", pow(a, b));
            break;
        case 2:
            printf("Raiz de %.2f: %.2f\n", a, sqrt(a));
            printf("Raiz de %.2f: %.2f\n", b, sqrt(b));
            break;
        case 3:
            printf("Raiz cúbica de %.2f: %.2f\n", a, cbrt(a));
            printf("Raiz cúbica de %.2f: %.2f\n", b, cbrt(b));
            break;
        default:
            printf("Opcao invalida.\n");
    }
}
```

### Exercício 7 - salario (./cap4/7_salario.c)

```c
#include <stdio.h>

int main() {
    float salario;

    printf("Digite o salario: ");
    scanf("%f", &salario);

    if (salario < 500) {
        salario *= 1.3; // Aumenta 30%
        printf("Novo salario: %.2f\n", salario);
    } else {
        printf("Salario invalido.\n");
    }
}
```

### Exercício 8 - salario porcentagem (./cap4/8_salario_porcentagem.c)

```c
#include <stdio.h>

int main() {
    float salario;

    printf("Digite o salario: ");
    scanf("%f", &salario);

    if (salario <= 300) {
        salario *= 1.35; // Aumenta 35%
        printf("Novo salario: %.2f\n", salario);
    } 
    
    else if (salario > 300) {
        salario *= 1.15; // Aumenta 15%
        printf("Novo salario: %.2f\n", salario);
    }
}
```

### Exercício 9 - banco (./cap4/9_banco.c)

```c
#include <stdio.h>

int main() {
    float salarioMedio, credito;

    printf("Digite o salario medio: ");
    scanf("%f", &salarioMedio);

    if (salarioMedio > 400) {
        credito = salarioMedio * 0.3;
    } else if (salarioMedio > 300) {
        credito = salarioMedio * 0.25;
    } else if (salarioMedio > 200) {
        credito = salarioMedio * 0.2;
    } else {
        credito = salarioMedio * 0.1;
    }

    printf("Credito: %.2f\n", credito);
}
```

### Exercício 10 - custo veiculo (./cap4/10_custo_veiculo.c)

```c
#include <stdio.h>

int main() {
    float custoFabrica, precoConsumidor;

    printf("Digite o custo de fabrica do veiculo: ");
    scanf("%f", &custoFabrica);

    if (custoFabrica <= 12000) {
        precoConsumidor = custoFabrica + (custoFabrica * 0.05);
    } else if (custoFabrica <= 25000) {
        precoConsumidor = custoFabrica + (custoFabrica * 0.10) + (custoFabrica * 0.15);
    } else {
        precoConsumidor = custoFabrica + (custoFabrica * 0.15) + (custoFabrica * 0.20);
    }

    printf("O preco ao consumidor e: %.2f\n", precoConsumidor);
}
```

### Exercício 11 - aumento salariio dnv (./cap4/11_aumento_salariio_dnv.c)

```c
#include <stdio.h>

int main() {
    float salario, novoSalario;

    printf("Digite o salario: ");
    scanf("%f", &salario);

    if (salario <= 300) {
        novoSalario = salario * 1.15; // Aumenta 15%
    } else if (salario > 300 && salario <= 600) {
        novoSalario = salario * 1.10; // Aumenta 10%
    } else if (salario > 600 && salario <= 900) {
        novoSalario = salario * 1.05; // Aumenta 5%
    } else {
        novoSalario = salario; // Sem aumento
    }

    printf("Novo salario: %.2f\n", novoSalario);
}
```

### Exercício 12 - salario gratificacao (./cap4/12_salario_gratificacao.c)

```c
#include <stdio.h>

int main() {
    float salario, gratificacao, novoSalario;

    printf("Digite o salario: ");
    scanf("%f", &salario);

    if (salario <= 350) {
        gratificacao = 100;
    } else if (salario <= 600) {
        gratificacao = 75;
    } else if (salario <= 900) {
        gratificacao = 50;
    } else {
        gratificacao = 35;
    }

    novoSalario = salario + gratificacao;

    printf("Novo salario com gratificacao: %.2f\n", novoSalario);
}
```

### Exercício 13 - preco clasificador (./cap4/13_preco_clasificador.c)

```c
#include <stdio.h>

int main() {
    float preco, novoPreco;
    char classificacao[20];

    printf("Digite o preco do produto: ");
    scanf("%f", &preco);

    // Aumento de preço
    if (preco <= 50) {
        novoPreco = preco * 1.05; // Aumenta 5%
    } else if (preco <= 100) {
        novoPreco = preco * 1.10; // Aumenta 10%
    } else {
        novoPreco = preco * 1.15; // Aumenta 15%
    }

    // Classificação
    if (novoPreco <= 80) {
        sprintf(classificacao, "Barato");
    } else if (novoPreco <= 120) {
        sprintf(classificacao, "Normal");
    } else if (novoPreco <= 200) {
        sprintf(classificacao, "Caro");
    } else {
        sprintf(classificacao, "Muito caro");
    }

    printf("Novo preco: %.2f\n", novoPreco);
    printf("Classificacao: %s\n", classificacao);
}
```

### Exercício 14 - salario dnv (./cap4/14_salario_dnv.c)

```c
#include <stdio.h>

int main() {
    float salario, novoSalario;

    printf("Digite o salario: ");
    scanf("%f", &salario);

    if (salario <= 300) {
        novoSalario = salario * 1.50; // Aumenta 50%
    } else if (salario > 300 && salario <= 500) {
        novoSalario = salario * 1.40; // Aumenta 40%
    } else if (salario > 500 && salario <= 700) {
        novoSalario = salario * 1.30; // Aumenta 30%
    } else if (salario > 700 && salario <= 800) {
        novoSalario = salario * 1.20; // Aumenta 20%
    } else if (salario > 800 && salario <= 1000) {
        novoSalario = salario * 1.10; // Aumenta 10%
    } else {
        novoSalario = salario * 1.05; // Aumenta 5%
    }

    printf("Novo salario: %.2f\n", novoSalario);
}
```

### Exercício 15 - outro banco (./cap4/15_outro_banco.c)

```c
#include <stdio.h>

//tipo investimento e valor
// tipo 1 = poupança 3% mensal
// tipo 2 = fundos de renda fixa 4% mensal

int main() {
    float valor, rendimento, total;
    int tipo, meses;

    printf("Digite o valor do investimento: ");
    scanf("%f", &valor);

    printf("Escolha o tipo de investimento (1 - Poupança, 2 - Fundos de Renda Fixa): ");
    scanf("%d", &tipo);

    printf("Digite o número de meses: ");
    scanf("%d", &meses);

    if (tipo == 1) {
        rendimento = valor * 0.03 * meses;
    } else if (tipo == 2) {
        rendimento = valor * 0.04 * meses;
    } else {
        printf("Tipo de investimento inválido.\n");
        return 1;
    }

    total = valor + rendimento;

    printf("Valor total após %d meses: %.2f\n", meses, total);
}
```

### Exercício 16 - desconto (./cap4/16_desconto.c)

```c
#include <stdio.h>

int main() {
    float valor, desconto, valorFinal;
    printf("Digite o valor do produto: ");
    scanf("%f", &valor);

    if (valor <= 30) {
        desconto = 0;
    } else if (valor > 30 && valor <= 100) {
        desconto = valor * 0.10;
    } else {
        desconto = valor * 0.15;
    }

    valorFinal = valor - desconto;
    printf("Valor final: %.2f\n", valorFinal);
}
```

### Exercício 17 - validade senha (./cap4/17_validade_senha.c)

```c
#include <stdio.h>

int main() {
    int senha;
    printf("Digite a senha: ");
    scanf("%d", &senha);

    if (senha == 4531) {
        printf("Acesso permitido.\n");
    } else {
        printf("Acesso negado.\n");
    }
}
```

### Exercício 18 - idade maioridade (./cap4/18_idade_maioridade.c)

```c
#include <stdio.h>

int main() {
    float idade;

    printf("Digite a idade: ");
    scanf("%f", &idade);

    if (idade < 18) {
        printf("Menor de idade\n");
    }

    else {
        printf("Maior de idade\n");
    }
}
```

### Exercício 19 - peso ideal (./cap4/19_peso_ideal.c)

```c
#include <stdio.h>

int main() {
    float altura, pesoIdeal;
    char sexo;

    printf("Digite seu sexo (M/F): ");
    scanf(" %c", &sexo);
    printf("Digite sua altura (em metros): ");
    scanf("%f", &altura);

    if (sexo == 'M' || sexo == 'm') {
        pesoIdeal = 72.7 * altura - 58;
        printf("Seu peso ideal e: %.2f kg\n", pesoIdeal);
    } else if (sexo == 'F' || sexo == 'f') {
        pesoIdeal = 62.1 * altura - 44.7;
        printf("Seu peso ideal e: %.2f kg\n", pesoIdeal);
    } else {
        printf("Sexo invalido.\n");
    }
}
```

### Exercício 20 - idade nadador (./cap4/20_idade_nadador.c)

```c
#include <stdio.h>

int main() {
    int idade;
    char categoria[20];

    printf("Digite a idade do nadador: ");
    scanf("%d", &idade);

    if (idade >= 5 && idade <= 7) {
        sprintf(categoria, "Infantil");
    } else if (idade >= 8 && idade <= 10) {
        sprintf(categoria, "Juvenil");
    } else if (idade >= 11 && idade <= 15) {
        sprintf(categoria, "Adolescente");
    } else if (idade >= 16 && idade <= 30) {
        sprintf(categoria, "Adulto");
    } else if (idade > 30) {
        sprintf(categoria, "Senior");
    } else {
        sprintf(categoria, "Idade invalida");
    }

    printf("Categoria: %s\n", categoria);
}
```

### Exercício 21 - procedencia (./cap4/21_procedencia.c)

```c
#include <stdio.h>

int main() {
    int estado, procedencia;
    printf("Digite o estado de procedencia (1 - Sul, 2 - Norte, 3 - Leste, 4 - Oeste, 5 - Nordeste, 6 - Sudeste, 7 - Centro-Oeste): ");
    scanf("%d", &estado);

    if (estado == 1 || estado == 2) {
        procedencia = 1; // Sul ou Norte
    } else if (estado == 3 || estado == 4) {
        procedencia = 2; // Leste ou Oeste
    } else if (estado >= 5 && estado <= 6) {
        procedencia = 3; // Nordeste ou Sudeste
    } else if (estado >= 7 && estado <= 20) {
        procedencia = 4; // Centro-Oeste
    } else if (estado >= 21 && estado <= 30) {
        procedencia = 5; // Nordeste
    } else {
        printf("Estado invalido.\n");
        return 1;
    }

    printf("A procedencia e: %d\n", procedencia);
    return 0;
}
```

### Exercício 22 - idade e peso (./cap4/22_idade_e_peso.c)

```c
#include <stdio.h>

int main() {
    int idade, peso, nota;
    
    printf("Digite a idade: ");
    scanf("%d", &idade);
    
    printf("Digite o peso: ");
    scanf("%d", &peso);
    
    if (idade < 20) {
        if (peso <= 60) {
            nota = 9;
        } else if (peso <= 90) {
            nota = 8;
        } else {
            nota = 7;
        }
    } else if (idade <= 50) {
        if (peso <= 60) {
            nota = 6;
        } else if (peso <= 90) {
            nota = 5;
        } else {
            nota = 4;
        }
    } else {
        if (peso <= 60) {
            nota = 3;
        } else if (peso <= 90) {
            nota = 2;
        } else {
            nota = 1;
        }
    }
    
    printf("Nota: %d\n", nota);
    
    return 0;
}
```

### Exercício 23 - codigo produto quantidade (./cap4/23_codigo_produto_quantidade.c)

```c
#include <stdio.h>

int main() {
    int codigo, quantidade;
    float preco, total, desconto, totalComDesconto;

    printf("Digite o codigo do produto (1 a 40): ");
    scanf("%d", &codigo);

    if (codigo < 1 || codigo > 40) {
        printf("Codigo invalido.\n");
        return 1;
    }

    printf("Digite a quantidade: ");
    scanf("%d", &quantidade);

    // Definindo o preco com base no codigo
    if (codigo >= 1 && codigo <= 10) {
        preco = 10.0;
    } else if (codigo >= 11 && codigo <= 20) {
        preco = 15.0;
    } else if (codigo >= 21 && codigo <= 30) {
        preco = 20.0;
    } else if (codigo >= 31 && codigo <= 40) {
        preco = 30.0;
    }

    total = preco * quantidade;

    // Calculando o desconto
    if (total <= 250) {
        desconto = total * 0.05; // 5%
    } else if (total > 250 && total <= 500) {
        desconto = total * 0.10; // 10%
    } else {
        desconto = total * 0.15; // 15%
    }

    totalComDesconto = total - desconto;

    printf("Preco unitario: %.2f\n", preco);
    printf("Preco total: %.2f\n", total);
    printf("Desconto: %.2f\n", desconto);
    printf("Total com desconto: %.2f\n", totalComDesconto);
}

```

### Exercício 24 - preco categorioa valor (./cap4/24_preco_categorioa_valor.c)

```c
#include <stdio.h>

int main() {
    float preco, novoPreco, imposto;
    int categoria;
    char situacao;

    printf("Digite o preco do produto: ");
    scanf("%f", &preco);

    printf("Digite a categoria (1 - Limpeza, 2 - Alimentacao, 3 - Vestuario): ");
    scanf("%d", &categoria);

    printf("Digite a situacao (R - Refrigeracao, N - Nao Refrigeracao): ");
    scanf(" %c", &situacao); // Note o espaço antes de %c para ignorar o caractere de nova linha

    if (preco <= 25) {
        switch (categoria) {
            case 1:
                novoPreco = preco * 1.05; // 5% aumento
                break;
            case 2:
                novoPreco = preco * 1.08; // 8% aumento
                break;
            case 3:
                novoPreco = preco * 1.10; // 10% aumento
                break;
            default:
                printf("Categoria invalida.\n");
                return 1;
        }
    } else {
        switch (categoria) {
            case 1:
                novoPreco = preco * 1.12; // 12% aumento
                break;
            case 2:
                novoPreco = preco * 1.15; // 15% aumento
                break;
            case 3:
                novoPreco = preco * 1.18; // 18% aumento
                break;
            default:
                printf("Categoria invalida.\n");
                return 1;
        }
    }

    if (categoria == 2 && situacao == 'R') {
        imposto = novoPreco * 0.05; // 5% imposto
    } else {
        imposto = novoPreco * 0.08; // 8% imposto
    }

    novoPreco += imposto;

    printf("Novo preco: %.2f\n", novoPreco);

    if (novoPreco <= 50) {
        printf("Barato\n");
    } else if (novoPreco > 50 && novoPreco < 120) {
        printf("Normal\n");
    } else {
        printf("Caro\n");
    }
}
```

### Exercício 25 - funcionario natal (./cap4/25_funcionario_natal.c)

```c
#include <stdio.h>

int main() {
    float horasExtras, horasFaltou, salario, salarioFinal;
    int categoria;

    printf("Digite o numero de horas extras: ");
    scanf("%f", &horasExtras);
    printf("Digite o numero de horas que faltou: ");
    scanf("%f", &horasFaltou);
    printf("Digite a categoria do funcionario (1 a 5): ");
    scanf("%d", &categoria);

    // Calculo do salario
    salario = (horasExtras - (2.0 / 3.0) * horasFaltou) * 10; // 10 reais por hora

    // Verifica a categoria e aplica o desconto
    if (salario >= 2400) {
        salarioFinal = salario - 500;
    } else if (salario >= 1800) {
        salarioFinal = salario - 400;
    } else if (salario >= 1200) {
        salarioFinal = salario - 300;
    } else if (salario >= 600) {
        salarioFinal = salario - 200;
    } else {
        salarioFinal = salario - 100;
    }

    printf("Salario final: %.2f\n", salarioFinal);
}
```

