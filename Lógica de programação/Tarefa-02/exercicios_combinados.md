# Nome: Victor Rosa Lima - RA: 51346

# Tarefa: Tarefa-02 e Tarefa-03

## Diretório: Tarefa-02

### Exercício 1 - calc (./Tarefa-02/cap3/1_calc.c)

```c
#include <stdio.h>

int main() {
    int first;
    int second;
    printf("Digite o primeiro número: ");
    scanf("%d", &first);
    printf("Digite o segundo número: ");
    scanf("%d", &second);

    printf("Subtração: %d\n", first - second);
}
```

### Exercício 1 - frase na tela (./Tarefa-02/lista-de-c-01/1_frase_na_tela.c)

```c
#include <stdio.h>

int main() {
    printf("Estou cursando Computação na EEP");
}

```

### Exercício 2 - mult (./Tarefa-02/cap3/2_mult.c)

```c
#include <stdio.h>

int main() {
    int first;
    int second;
    int third;

    printf("Digite o primeiro número: ");
    scanf("%d", &first);
    printf("Digite o segundo número: ");
    scanf("%d", &second);
    printf("Digite o terceiro número: ");
    scanf("%d", &third);

    printf("Multiplicação: %d\n", first * second * third);
}
```

### Exercício 2 - etiqueta (./Tarefa-02/lista-de-c-01/2_etiqueta.c)

```c
#include <stdio.h>

int main() {
  struct {
    char nome[50];
    char endereco[100];
    char cep[9];
    char telefone[15];
  } pessoa;

  printf("Nome: ");
  gets(pessoa.nome);
  printf("Endereco: ");
  gets(pessoa.endereco);
  printf("CEP: ");
  gets(pessoa.cep);
  printf("Telefone: ");
  gets(pessoa.telefone);

  printf("\n\n");
  printf("Nome: %s\n", pessoa.nome);
  printf("Endereco: %s\n", pessoa.endereco);
  printf("CEP: %s\n", pessoa.cep);
  printf("Telefone: %s\n", pessoa.telefone);
}
```

### Exercício 3 - div (./Tarefa-02/cap3/3_div.c)

```c
#include <stdio.h>

int main() {
    float first;
    float second;

    printf("Digite o primeiro número: ");
    scanf("%f", &first);
    printf("Digite o segundo número: ");
    scanf("%f", &second);

    printf("Divisão: %.2f\n", first / second);
}
```

### Exercício 3 - frases assassinas (./Tarefa-02/lista-de-c-01/3_frases_assassinas.c)

```c
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main() {
  char frases[6][100] = {
    "Você vai falhar",
    "Você é insuficiente",
    "Nada que você faz vai dar certo",
    "Seu bobalhão!",
    "Vai dar em nada",
    "Não fez mais que o mínimo",
  };

  srand(time(NULL));
  int i = rand() % 6;
  printf("%s\n", frases[i]);
  return 0;
}

```

### Exercício 4 - media ponderada (./Tarefa-02/cap3/4_media_ponderada.c)

```c
#include <stdio.h>
 
int main() {
    float n1, n2;

    printf("Digite a primeira nota: ");
    scanf("%f", &n1);
    printf("Digite a segunda nota: ");
    scanf("%f", &n2);

    printf("Média ponderada: %.2f\n", (n1 * 2 + n2 * 3) / 5);
}
```

### Exercício 5 - desconto (./Tarefa-02/cap3/5_desconto.c)

```c
#include <stdio.h>

int main() {
    float price;

    printf("Digite o preço do produto: ");
    scanf("%f", &price);

    printf("Preço com desconto: %.2f\n", price * 0.9);
}
```

### Exercício 5 - quadrado (./Tarefa-02/lista-de-c-01/5_quadrado.c)

```c
#include <stdio.h>

int main() {
    int size;
    printf("Digite o tamanho do quadrado: ");
    scanf("%d", &size);

    for (int i = 0; i < size; i++) {
        for (int j = 0; j < size; j++) {
            if (i == 0 || i == size - 1 || j == 0 || j == size - 1) printf("X");
            else printf(" ");
        }

        printf("\n");
    }
}
```

### Exercício 6 - salario mais comissao (./Tarefa-02/cap3/6_salario_mais_comissao.c)

```c
#include <stdio.h>

int main() {
    float salary, sales;

    printf("Digite o salário fixo: ");
    scanf("%f", &salary);
    printf("Digite o total de vendas: ");
    scanf("%f", &sales);

    printf("Salário total: %.2f\n", salary + sales * 0.04);
}
```

### Exercício 6 - tabela notas (./Tarefa-02/lista-de-c-01/6_tabela_notas.c)

```c
#include <stdio.h>

int main() {
    struct estudante
    {
        char nome[50];
        float nota;
    };

    int running = 1;
    while (running) {
        int n;
        printf("Digite o número de estudantes: ");
        scanf("%d", &n);

        struct estudante estudantes[n];

        for (int i = 0; i < n; i++) {
            printf("Nome do estudante %d: ", i + 1);
            scanf("%s", estudantes[i].nome);
            printf("Nota do estudante %d: ", i + 1);
            scanf("%f", &estudantes[i].nota);
        }

        printf("\n\n");
        printf("Nome\tNota\n");
        for (int i = 0; i < n; i++) {
            printf("%s\t%.2f\n", estudantes[i].nome, estudantes[i].nota);
        }

        printf("\n\n");
        printf("Deseja continuar? (1 - Sim, 0 - Não): ");
        scanf("%d", &running);
    }
}
```

### Exercício 7 - peso (./Tarefa-02/cap3/7_peso.c)

```c
#include <stdio.h>

int main() {
    float weight;

    printf("Digite o peso: ");
    scanf("%f", &weight);

    printf("Emagrecer: %.2f\n", weight * 0.8);
    printf("Engordar: %.2f\n", weight * 1.15);
}
```

### Exercício 7 - letra grande (./Tarefa-02/lista-de-c-01/7_letra_grande.c)

```c
#include <stdio.h>

int main() {
    printf("EEEEE\n");
    printf("E\n");
    printf("EEEEE\n");
    printf("E\n");
    printf("EEEEE\n");
}
```

### Exercício 8 - peso para gramas (./Tarefa-02/cap3/8_peso_para_gramas.c)

```c
#include <stdio.h>

int main() {
    float weight;

    printf("Digite o peso: ");
    scanf("%f", &weight);

    printf("Peso em gramas: %.2f\n", weight * 1000);
}
```

### Exercício 8 - menu (./Tarefa-02/lista-de-c-01/8_menu.c)

```c
#include <stdio.h>

int main() {
    printf("1 - Inclui\n");
    printf("2 - Altera\n");
    printf("3 - Exclui\n");
    printf("4 - Consulta\n");
    printf("5 - Fim\n");
    printf("Opção:\n");
}
```

### Exercício 9 - area trapezio (./Tarefa-02/cap3/9_area_trapezio.c)

```c
#include <stdio.h>

int main() {
    float base1, base2, height;

    printf("Digite a base maior: ");
    scanf("%f", &base1);
    printf("Digite a base menor: ");
    scanf("%f", &base2);
    printf("Digite a altura: ");
    scanf("%f", &height);

    printf("Área do trapézio: %.2f\n", (base1 + base2) * height / 2);
}
```

### Exercício 9 - pinheiro (./Tarefa-02/lista-de-c-01/9_pinheiro.c)

```c
#include <stdio.h>

int main() {
    int size;
    printf("Tamanho: ");
    scanf("%d", &size);   

    for (int i = 0; i < size; i++) {
        for (int j = 0; j < size - i - 1; j++) {
            printf(" ");
        }
        for (int j = 0; j < 2*i + 1; j++) {
            printf("X");
        }
        printf("\n");
    }
    
    for (int i = 0; i < size/3; i++) {
        if (i == size / 3 - 1) {
            for (int j = 0; j < size - 3; j++) {
                printf(" ");
            }
            printf("XXXXX\n");
        } else {
            for (int j = 0; j < size - 2; j++) {
                printf(" ");
            }
            printf("XXX\n");
        }
    }
}
```

### Exercício 10 - area quadrado (./Tarefa-02/cap3/10_area_quadrado.c)

```c
#include <stdio.h>

int main() {
    float side;

    printf("Digite o lado do quadrado: ");
    scanf("%f", &side);

    printf("Área do quadrado: %.2f\n", side * side);
}
```

### Exercício 11 - area losango (./Tarefa-02/cap3/11_area_losango.c)

```c
#include <stdio.h>

int main() {
    float diagonal1, diagonal2;

    printf("Digite a diagonal 1: ");
    scanf("%f", &diagonal1);
    printf("Digite a diagonal 2: ");
    scanf("%f", &diagonal2);

    printf("Área do losango: %.2f\n", diagonal1 * diagonal2 / 2);
}
```

### Exercício 12 - salario minimos do funcionario (./Tarefa-02/cap3/12_salario_minimos_do_funcionario.c)

```c
#include <stdio.h>

int main() {
    float salary, min_salary;

    printf("Digite o salário do funcionário: ");
    scanf("%f", &salary);
    printf("Digite o salário mínimo: ");
    scanf("%f", &min_salary);

    printf("Salários mínimos do funcionário: %.2f\n", salary / min_salary);
}
```

### Exercício 13 - tabuada (./Tarefa-02/cap3/13_tabuada.c)

```c
#include <stdio.h>

int main() {
    int number;

    printf("Digite um número: ");
    scanf("%d", &number);

    for (int i = 1; i <= 10; i++) {
        printf("%d x %d = %d\n", number, i, number * i);
    }
}
```

### Exercício 14 - nascimento (./Tarefa-02/cap3/14_nascimento.c)

```c
#include <stdio.h>

int main() {
    int birth_year, current_year;

    printf("Digite o ano de nascimento: ");
    scanf("%d", &birth_year);
    printf("Digite o ano atual: ");
    scanf("%d", &current_year);

    printf("Idade: %d anos\n", current_year - birth_year);
    printf("Idade: %d meses\n", (current_year - birth_year) * 12);
    printf("Idade: %d dias\n", (current_year - birth_year) * 365);
    printf("Idade: %d semanas\n", (current_year - birth_year) * 52);
}
```

### Exercício 15 - multa (./Tarefa-02/cap3/15_multa.c)

```c
#include <stdio.h>

int main() {
    float salary, fine;

    printf("Digite o salário: ");
    scanf("%f", &salary);
    printf("Digite a multa: ");
    scanf("%f", &fine);

    printf("Salário com multa: %.2f\n", salary - (fine * 2) * 0.02);
}
```

### Exercício 16 - hipotenusa (./Tarefa-02/cap3/16_hipotenusa.c)

```c
#include <stdio.h>

int main() {
    float side1, side2;

    printf("Digite o lado 1: ");
    scanf("%f", &side1);
    printf("Digite o lado 2: ");
    scanf("%f", &side2);

    printf("Hipotenusa: %.2f\n", sqrt(side1 * side1 + side2 * side2));
}
```

### Exercício 17 - raio (./Tarefa-02/cap3/17_raio.c)

```c
#include <stdio.h>

int main() {
    float radius;

    printf("Digite o raio: ");
    scanf("%f", &radius);

    printf("Circunferência do círculo: %.2f\n", 2 * 3.14 * radius);
    printf("Área da esfera: %.2f\n", 4 * 3.14 * radius * radius);
    printf("Volume da esfera: %.2f\n", 4 / 3 * 3.14 * radius * radius * radius);
}
```

### Exercício 18 - converter fahrenheit (./Tarefa-02/cap3/18_converter_fahrenheit.c)

```c
#include <stdio.h>
 
int main() {
    float celsius;
 
    printf("Digite a temperatura em Celsius: ");
    scanf("%f", &celsius);
 
    printf("Fahrenheit: %.2f\n", celsius * 1.8 + 32);
}
```

### Exercício 19 - potencia (./Tarefa-02/cap3/19_potencia.c)

```c
#include <stdio.h>

int main() {
    float x, z;

    printf("Digite a base: ");
    scanf("%f", &x);
    printf("Digite a largura: ");
    scanf("%f", &z);

    float area = x * z;
    printf("Energia: %.2fW\n", area * 18);
}
```

### Exercício 20 - escada (./Tarefa-02/cap3/20_escada.c)

```c
#include <stdio.h>

int main() {
    float angle, distance;

    printf("Digite o ângulo: ");
    scanf("%f", &angle);
    printf("Digite a distância: ");
    scanf("%f", &distance);

    printf("Altura: %.2f\n", distance * sin(angle));
}
```

### Exercício 21 - horas de trabalho (./Tarefa-02/cap3/21_horas_de_trabalho.c)

```c
#include <stdio.h>

int main() {
    float worked_hours, minimum_wage, extra_hours;

    // worked hour = 1/8 minimum wage
    // extra hour = 1/4 minimum wage
    printf("Digite as horas trabalhadas: ");
    scanf("%f", &worked_hours);
    printf("Digite o salário mínimo: ");
    scanf("%f", &minimum_wage);
    printf("Digite as horas extras: ");
    scanf("%f", &extra_hours);

    float salary = (worked_hours * minimum_wage) * 1/8 + (extra_hours * minimum_wage) * 1/4;
    printf("Salário: %.2f\n", salary);
}
```

### Exercício 22 - diagonais poligono (./Tarefa-02/cap3/22_diagonais_poligono.c)

```c
#include <stdio.h>

int main() {
    int sides;
    printf("Digite o número de lados do polígono: ");
    scanf("%d", &sides);

    printf("Número de diagonais: %d\n", sides * (sides - 3) / 2);
}
```

### Exercício 23 - angulo triangulo (./Tarefa-02/cap3/23_angulo_triangulo.c)

```c
#include <stdio.h>

int main() {
    float angle1, angle2;

    printf("Digite o primeiro ângulo: ");
    scanf("%f", &angle1);
    printf("Digite o segundo ângulo: ");
    scanf("%f", &angle2);

    float angle3 = 180 - angle1 - angle2;
    printf("Terceiro ângulo: %.2f\n", angle3);
}
```

### Exercício 24 - convert money (./Tarefa-02/cap3/24_convert_money.c)

```c
#include <stdio.h>

int main() {
    float money;
    printf("Digite o valor em reais: ");
    scanf("%f", &money);

    printf("Dolar: %.2f\n", money / 1.8);
    printf("Marco alemão: %.2f\n", money / 2);
    printf("Libra esterlina: %.2f\n", money / 3.57);
}
```

### Exercício 25 - hora (./Tarefa-02/cap3/25_hora.c)

```c
#include <stdio.h>

int main() {
    float hours, minutes;
    printf("Digite as horas: ");
    scanf("%f", &hours);
    printf("Digite os minutos: ");
    scanf("%f", &minutes);

    printf("Hora: %.2f\n", hours + minutes / 60);
    printf("Minutos: %.2f\n", hours * 60 + minutes);
    printf("Segundos: %.2f\n", hours * 3600 + minutes * 60);
}
```

## Diretório: Tarefa-03

### Exercício 1 - media nota (./Tarefa-03/cap4/1_media_nota.c)

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

### Exercício 2 - resultado nota (./Tarefa-03/cap4/2_resultado_nota.c)

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

### Exercício 3 - menor (./Tarefa-03/cap4/3_menor.c)

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

### Exercício 4 - maior (./Tarefa-03/cap4/4_maior.c)

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

### Exercício 5 - escolha (./Tarefa-03/cap4/5_escolha.c)

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

### Exercício 6 - escolha2 (./Tarefa-03/cap4/6_escolha2.c)

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

### Exercício 7 - salario (./Tarefa-03/cap4/7_salario.c)

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

### Exercício 8 - salario porcentagem (./Tarefa-03/cap4/8_salario_porcentagem.c)

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

### Exercício 9 - banco (./Tarefa-03/cap4/9_banco.c)

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

### Exercício 10 - custo veiculo (./Tarefa-03/cap4/10_custo_veiculo.c)

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

### Exercício 11 - aumento salariio dnv (./Tarefa-03/cap4/11_aumento_salariio_dnv.c)

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

### Exercício 12 - salario gratificacao (./Tarefa-03/cap4/12_salario_gratificacao.c)

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

### Exercício 13 - preco clasificador (./Tarefa-03/cap4/13_preco_clasificador.c)

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

### Exercício 14 - salario dnv (./Tarefa-03/cap4/14_salario_dnv.c)

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

### Exercício 15 - outro banco (./Tarefa-03/cap4/15_outro_banco.c)

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

### Exercício 16 - desconto (./Tarefa-03/cap4/16_desconto.c)

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

### Exercício 17 - validade senha (./Tarefa-03/cap4/17_validade_senha.c)

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

### Exercício 18 - idade maioridade (./Tarefa-03/cap4/18_idade_maioridade.c)

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

### Exercício 19 - peso ideal (./Tarefa-03/cap4/19_peso_ideal.c)

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

### Exercício 20 - idade nadador (./Tarefa-03/cap4/20_idade_nadador.c)

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

### Exercício 21 - procedencia (./Tarefa-03/cap4/21_procedencia.c)

```c
#include <stdio.h>

// 1 = sul
// 2 = norte
// 3 leste
// 4 = oeste
// 5 6 nordeste
// 7 8 9 sudeste
// 10 a 20 centro oeste
// 21 a 30 nordeste

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

### Exercício 22 - idade e peso (./Tarefa-03/cap4/22_idade_e_peso.c)

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

### Exercício 23 - codigo produto quantidade (./Tarefa-03/cap4/23_codigo_produto_quantidade.c)

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

### Exercício 24 - preco categorioa valor (./Tarefa-03/cap4/24_preco_categorioa_valor.c)

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

### Exercício 25 - funcionario natal (./Tarefa-03/cap4/25_funcionario_natal.c)

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

