# Nome: Victor Rosa Lima - RA: 51346

# Tarefa: cap3 e lista-de-c-01

## Diretório: cap3

### Exercício 1 - calc (./cap3/1_calc.c)

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

### Exercício 2 - mult (./cap3/2_mult.c)

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

### Exercício 3 - div (./cap3/3_div.c)

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

### Exercício 4 - media ponderada (./cap3/4_media_ponderada.c)

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

### Exercício 5 - desconto (./cap3/5_desconto.c)

```c
#include <stdio.h>

int main() {
    float price;

    printf("Digite o preço do produto: ");
    scanf("%f", &price);

    printf("Preço com desconto: %.2f\n", price * 0.9);
}
```

### Exercício 6 - salario mais comissao (./cap3/6_salario_mais_comissao.c)

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

### Exercício 7 - peso (./cap3/7_peso.c)

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

### Exercício 8 - peso para gramas (./cap3/8_peso_para_gramas.c)

```c
#include <stdio.h>

int main() {
    float weight;

    printf("Digite o peso: ");
    scanf("%f", &weight);

    printf("Peso em gramas: %.2f\n", weight * 1000);
}
```

### Exercício 9 - area trapezio (./cap3/9_area_trapezio.c)

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

### Exercício 10 - area quadrado (./cap3/10_area_quadrado.c)

```c
#include <stdio.h>

int main() {
    float side;

    printf("Digite o lado do quadrado: ");
    scanf("%f", &side);

    printf("Área do quadrado: %.2f\n", side * side);
}
```

### Exercício 11 - area losango (./cap3/11_area_losango.c)

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

### Exercício 12 - salario minimos do funcionario (./cap3/12_salario_minimos_do_funcionario.c)

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

### Exercício 13 - tabuada (./cap3/13_tabuada.c)

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

### Exercício 14 - nascimento (./cap3/14_nascimento.c)

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

### Exercício 15 - multa (./cap3/15_multa.c)

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

### Exercício 16 - hipotenusa (./cap3/16_hipotenusa.c)

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

### Exercício 17 - raio (./cap3/17_raio.c)

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

### Exercício 18 - converter fahrenheit (./cap3/18_converter_fahrenheit.c)

```c
#include <stdio.h>
 
int main() {
    float celsius;
 
    printf("Digite a temperatura em Celsius: ");
    scanf("%f", &celsius);
 
    printf("Fahrenheit: %.2f\n", celsius * 1.8 + 32);
}
```

### Exercício 19 - potencia (./cap3/19_potencia.c)

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

### Exercício 20 - escada (./cap3/20_escada.c)

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

### Exercício 21 - horas de trabalho (./cap3/21_horas_de_trabalho.c)

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

### Exercício 22 - diagonais poligono (./cap3/22_diagonais_poligono.c)

```c
#include <stdio.h>

int main() {
    int sides;
    printf("Digite o número de lados do polígono: ");
    scanf("%d", &sides);

    printf("Número de diagonais: %d\n", sides * (sides - 3) / 2);
}
```

### Exercício 23 - angulo triangulo (./cap3/23_angulo_triangulo.c)

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

### Exercício 24 - convert money (./cap3/24_convert_money.c)

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

### Exercício 25 - hora (./cap3/25_hora.c)

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

## Diretório: lista-de-c-01

### Exercício 1 - frase na tela (./lista-de-c-01/1_frase_na_tela.c)

```c
#include <stdio.h>

int main() {
    printf("Estou cursando Computação na EEP");
}

```

### Exercício 2 - etiqueta (./lista-de-c-01/2_etiqueta.c)

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

### Exercício 3 - frases assassinas (./lista-de-c-01/3_frases_assassinas.c)

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

### Exercício 5 - quadrado (./lista-de-c-01/5_quadrado.c)

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

### Exercício 6 - tabela notas (./lista-de-c-01/6_tabela_notas.c)

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

### Exercício 7 - letra grande (./lista-de-c-01/7_letra_grande.c)

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

### Exercício 8 - menu (./lista-de-c-01/8_menu.c)

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

### Exercício 9 - pinheiro (./lista-de-c-01/9_pinheiro.c)

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

