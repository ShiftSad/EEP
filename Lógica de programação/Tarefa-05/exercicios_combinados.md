# Nome: Victor Rosa Lima - RA: 51346

# Tarefa: funcoes

## Diretório: funcoes

### Exercício 1 - soma 1 a n (./funcoes/1_soma_1_a_n.c)

```c
#include <stdio.h>

int somar_de_um_a_n(int n_val) {
    int soma = 0;
    if (n_val > 0) {
        for (int i = 1; i <= n_val; i++) {
            soma += i;
        }
    }
    return soma;
}

int main() {
    int numero;
    scanf("%d", &numero);
    printf("%d\n", somar_de_um_a_n(numero));
    return 0;
}

```

### Exercício 2 - converter para segundos (./funcoes/2_converter_para_segundos.c)

```c
#include <stdio.h>

int converter_tempo_para_segundos(int horas, int minutos, int segundos) {
    return (horas * 3600) + (minutos * 60) + segundos;
}

int main() {
    int h, m, s;
    scanf("%d %d %d", &h, &m, &s);
    printf("%d\n", converter_tempo_para_segundos(h, m, s));
    return 0;
}

```

### Exercício 3 - verificar divisor (./funcoes/3_verificar_divisor.c)

```c
#include <stdio.h>

int verificar_divisibilidade_e_retornar_divisor(int num1, int num2) {
    if (num2 == 0) return -1; // Indicador de erro para divisor zero
    if (num1 % num2 == 0) {
        return 0;
    } else {
        return num2;
    }
}

int main() {
    int n1, n2;
    scanf("%d %d", &n1, &n2);
    printf("%d\n", verificar_divisibilidade_e_retornar_divisor(n1, n2));
    return 0;
}

```

### Exercício 4 - volume esfera (./funcoes/4_volume_esfera.c)

```c
#include <stdio.h>
#include <math.h>

#define PI 3.141592645

double calcular_volume_esfera(double raio) {
    if (raio < 0) return 0.0;
    return (4.0 / 3.0) * PI * pow(raio, 3);
}

int main() {
    double r;
    scanf("%lf", &r);
    double volume = calcular_volume_esfera(r);
    printf("%.2f\n", volume);
    return 0;
}

```

### Exercício 5 - verificar sinal numero (./funcoes/5_verificar_sinal_numero.c)

```c
#include <stdio.h>

int verificar_sinal_do_numero(int valor) {
    if (valor > 0) {
        return 1; // Positivo
    } else if (valor < 0) {
        return -1; // Negativo
    } else {
        return 0; // Zero
    }
}

int main() {
    int val;
    scanf("%d", &val);
    int sinal = verificar_sinal_do_numero(val);
    if (sinal == 1) {
        printf("Positivo\n");
    } else if (sinal == -1) {
        printf("Negativo\n");
    } else {
        printf("Zero\n");
    }
    return 0;
}

```

### Exercício 6 - peso ideal (./funcoes/6_peso_ideal.c)

```c
#include <stdio.h>

double calcular_peso_ideal_pessoa(double altura, char sexo) {
    if (sexo == 'M' || sexo == 'm') {
        return (72.7 * altura) - 58.0;
    } else if (sexo == 'F' || sexo == 'f') {
        return (62.1 * altura) - 44.7;
    }
    return 0.0; // Sexo invalido
}

int main() {
    double alt;
    char sex;
    scanf("%lf %c", &alt, &sex);
    printf("%.2f\n", calcular_peso_ideal_pessoa(alt, sex));
    return 0;
}

```

### Exercício 7 - media valores positivos (./funcoes/7_media_valores_positivos.c)

```c
#include <stdio.h>

double calcular_media_de_valores_positivos() {
    double soma = 0.0;
    int contador = 0;
    double valor;
    scanf("%lf", &valor);
    while (valor != 0) {
        if (valor > 0) {
            soma += valor;
            contador++;
        }
        scanf("%lf", &valor);
    }
    if (contador == 0) return 0.0;
    return soma / contador;
}

int main() {
    printf("%.2f\n", calcular_media_de_valores_positivos());
    return 0;
}

```

### Exercício 8 - fatorial (./funcoes/8_fatorial.c)

```c
#include <stdio.h>

void calcular_e_mostrar_fatorial_de_numero(int n) {
    if (n < 0) {
        printf("Fatorial nao definido para negativos\n");
        return;
    }
    long long fatorial = 1;
    for (int i = 1; i <= n; i++) {
        fatorial *= i;
    }
    printf("%lld\n", fatorial);
}

int main() {
    int num;
    scanf("%d", &num);
    calcular_e_mostrar_fatorial_de_numero(num);
    return 0;
}

```

### Exercício 9 - soma divisores (./funcoes/9_soma_divisores.c)

```c
#include <stdio.h>

int somar_divisores_de_numero(int n) {
    if (n <= 0) return 0;
    int soma = 0;
    for (int i = 1; i <= n; i++) {
        if (n % i == 0) {
            soma += i;
        }
    }
    return soma;
}

int main() {
    int val;
    scanf("%d", &val);
    printf("%d\n", somar_divisores_de_numero(val));
    return 0;
}

```

### Exercício 10 - sequencia s (./funcoes/10_sequencia_s.c)

```c
#include <stdio.h>

double calcular_valor_da_sequencia_s(int n_termos) {
    double s = 0.0;
    if (n_termos >= 1) {
        for (int i = 1; i <= n_termos; i++) {
            s += 1.0 / i;
        }
    }
    return s;
}

int main() {
    int n_val;
    scanf("%d", &n_val);
    printf("%.2f\n", calcular_valor_da_sequencia_s(n_val));
    return 0;
}

```

### Exercício 11 - soma s formula (./funcoes/11_soma_s_formula.c)

```c
#include <stdio.h>
#include <math.h>

double calcular_soma_s_formula(int n_termos) {
    double s = 0.0;
    for (int i = 1; i <= n_termos; i++) {
        s += (pow(i, 2) + 1.0) / (i + 3.0);
    }
    return s;
}

int main() {
    int n_val;
    scanf("%d", &n_val);
    if (n_val > 0) {
        double resultado = calcular_soma_s_formula(n_val);
        printf("%.2f\n", resultado);
    }
    return 0;
}

```

### Exercício 12 - potencia manual (./funcoes/12_potencia_manual.c)

```c
#include <stdio.h>

double calcular_potencia(double base, int expoente) {
    double resultado = 1.0;
    if (expoente == 0) return 1.0;
    int exp_abs = expoente > 0 ? expoente : -expoente;
    for (int i = 0; i < exp_abs; i++) {
        resultado *= base;
    }
    if (expoente < 0) return 1.0 / resultado;
    return resultado;
}

int main() {
    double x_val;
    int z_val;
    scanf("%lf %d", &x_val, &z_val);
    double resultado = calcular_potencia(x_val, z_val);
    printf("%.2f\n", resultado);
    return 0;
}

```

### Exercício 13 - pesquisa habitantes (./funcoes/13_pesquisa_habitantes.c)

```c
#include <stdio.h>
#define N_HABITANTES 15

void ler_dados_habitantes(int idades[], char sexos[], double salarios[], int num_filhos[]) {
    for (int i = 0; i < N_HABITANTES; i++) {
        scanf("%d %c %lf %d", &idades[i], &sexos[i], &salarios[i], &num_filhos[i]);
    }
}

double calcular_media_salario(double salarios[]) {
    double soma = 0.0;
    for (int i = 0; i < N_HABITANTES; i++) {
        soma += salarios[i];
    }
    return soma / N_HABITANTES;
}

void encontrar_menor_maior_idade(int idades[], int *menor, int *maior) {
    *menor = idades[0];
    *maior = idades[0];
    for (int i = 1; i < N_HABITANTES; i++) {
        if (idades[i] < *menor) *menor = idades[i];
        if (idades[i] > *maior) *maior = idades[i];
    }
}

int contar_mulheres_condicao(char sexos[], int num_filhos[], double salarios[]) {
    int contador = 0;
    for (int i = 0; i < N_HABITANTES; i++) {
        if (sexos[i] == 'F' && num_filhos[i] == 3 && salarios[i] <= 500.00) {
            contador++;
        }
    }
    return contador;
}

int main() {
    int idades[N_HABITANTES];
    char sexos[N_HABITANTES];
    double salarios[N_HABITANTES];
    int num_filhos[N_HABITANTES];
    ler_dados_habitantes(idades, sexos, salarios, num_filhos);
    double media_sal = calcular_media_salario(salarios);
    printf("%.2f\n", media_sal);
    int menor_idade, maior_idade;
    encontrar_menor_maior_idade(idades, &menor_idade, &maior_idade);
    printf("%d\n%d\n", menor_idade, maior_idade);
    int qtd_mulheres = contar_mulheres_condicao(sexos, num_filhos, salarios);
    printf("%d\n", qtd_mulheres);
    return 0;
}

```

### Exercício 14 - separar vetor (./funcoes/14_separar_vetor.c)

```c
#include <stdio.h>
#define TAM_X 30

void separar_vetor(int x[], int a[], int *nA, int b[], int *nB) {
    *nA = 0; *nB = 0;
    for (int i = 0; i < TAM_X; i++) {
        if (x[i] > 0) {
            a[*nA] = x[i];
            (*nA)++;
        } else {
            b[*nB] = x[i];
            (*nB)++;
        }
    }
}

int main() {
    int x[TAM_X];
    int a[TAM_X], b[TAM_X];
    int nA, nB;
    for (int i = 0; i < TAM_X; i++) scanf("%d", &x[i]);
    separar_vetor(x, a, &nA, b, &nB);
    for (int i = 0; i < nA; i++) printf("%d ", a[i]);
    printf("\n");
    for (int i = 0; i < nB; i++) printf("%d ", b[i]);
    printf("\n");
    return 0;
}

```

### Exercício 15 - contar pares (./funcoes/15_contar_pares.c)

```c
#include <stdio.h>
#define TAM_VETOR_15 15

int contar_numeros_pares(int x[]) {
    int contador = 0;
    for (int i = 0; i < TAM_VETOR_15; i++) {
        if (x[i] % 2 == 0) {
            contador++;
        }
    }
    return contador;
}

int main() {
    int x[TAM_VETOR_15];
    for (int i = 0; i < TAM_VETOR_15; i++) scanf("%d", &x[i]);
    int qtd_pares = contar_numeros_pares(x);
    printf("%d\n", qtd_pares);
    return 0;
}

```

### Exercício 16 - soma elementos vetor real (./funcoes/16_soma_elementos_vetor_real.c)

```c
#include <stdio.h>
#define TAM_VETOR_20 20

double somar_elementos_vetor(double x[]) {
    double soma = 0.0;
    for (int i = 0; i < TAM_VETOR_20; i++) {
        soma += x[i];
    }
    return soma;
}

int main() {
    double x[TAM_VETOR_20];
    for (int i = 0; i < TAM_VETOR_20; i++) scanf("%lf", &x[i]);
    double resultado_soma = somar_elementos_vetor(x);
    printf("%.2f\n", resultado_soma);
    return 0;
}

```

### Exercício 17 - mdc (./funcoes/17_mdc.c)

```c
#include <stdio.h>

int calcular_mdc(int a, int b) {
    int temp;
    while (b != 0) {
        temp = b;
        b = a % b;
        a = temp;
    }
    return a;
}

int main() {
    int num1, num2;
    scanf("%d %d", &num1, &num2);
    int mdc = calcular_mdc(num1, num2);
    printf("%d\n", mdc);
    return 0;
}

```

### Exercício 18 - tres primos acima 100 (./funcoes/18_tres_primos_acima_100.c)

```c
#include <stdio.h>
#include <stdbool.h>

bool eh_primo(int num) {
    if (num <= 1) return false;
    for (int i = 2; i * i <= num; i++) {
        if (num % i == 0) return false;
    }
    return true;
}

void gerar_e_mostrar_primos_acima_100() {
    int contador_primos = 0;
    int numero_atual = 101;
    while (contador_primos < 3) {
        if (eh_primo(numero_atual)) {
            printf("%d\n", numero_atual);
            contador_primos++;
        }
        numero_atual++;
    }
}

int main() {
    gerar_e_mostrar_primos_acima_100();
    return 0;
}

```

### Exercício 19 - interseccao vetores (./funcoes/19_interseccao_vetores.c)

```c
#include <stdio.h>
#define TAM_VETOR_10 10

void encontrar_interseccao(int v1[], int v2[], int interseccao[], int *n_interseccao) {
    *n_interseccao = 0;
    for (int i = 0; i < TAM_VETOR_10; i++) {
        for (int j = 0; j < TAM_VETOR_10; j++) {
            if (v1[i] == v2[j]) {
                int encontrado = 0;
                for (int k = 0; k < *n_interseccao; k++) {
                    if (interseccao[k] == v1[i]) {
                        encontrado = 1;
                        break;
                    }
                }
                if (!encontrado) {
                    interseccao[*n_interseccao] = v1[i];
                    (*n_interseccao)++;
                }
                break; 
            }
        }
    }
}

int main() {
    int vet1[TAM_VETOR_10], vet2[TAM_VETOR_10];
    int interseccao[TAM_VETOR_10];
    int n_inter;
    for (int i = 0; i < TAM_VETOR_10; i++) scanf("%d", &vet1[i]);
    for (int i = 0; i < TAM_VETOR_10; i++) scanf("%d", &vet2[i]);
    encontrar_interseccao(vet1, vet2, interseccao, &n_inter);
    for (int i = 0; i < n_inter; i++) printf("%d ", interseccao[i]);
    printf("\n");
    return 0;
}

```

### Exercício 20 - pesquisa cidade (./funcoes/20_pesquisa_cidade.c)

```c
#include <stdio.h>
#define MAX_PESSOAS 1000 

void ler_dados_pesquisa(double salarios[], int num_filhos[], int *num_pessoas) {
    *num_pessoas = 0;
    double salario_atual;
    int filhos_atual;
    while (*num_pessoas < MAX_PESSOAS) {
        scanf("%lf", &salario_atual);
        if (salario_atual < 0) break; 
        scanf("%d", &filhos_atual);
        salarios[*num_pessoas] = salario_atual;
        num_filhos[*num_pessoas] = filhos_atual;
        (*num_pessoas)++;
    }
}

double calcular_media_salario_populacao(double salarios[], int num_pessoas) {
    if (num_pessoas == 0) return 0.0;
    double soma = 0.0;
    for (int i = 0; i < num_pessoas; i++) soma += salarios[i];
    return soma / num_pessoas;
}

double calcular_media_filhos(int num_filhos[], int num_pessoas) {
    if (num_pessoas == 0) return 0.0;
    int soma = 0;
    for (int i = 0; i < num_pessoas; i++) soma += num_filhos[i];
    return (double)soma / num_pessoas;
}

double encontrar_maior_salario(double salarios[], int num_pessoas) {
    if (num_pessoas == 0) return 0.0;
    double maior = salarios[0];
    for (int i = 1; i < num_pessoas; i++) {
        if (salarios[i] > maior) maior = salarios[i];
    }
    return maior;
}

double calcular_percentual_salario_baixo(double salarios[], int num_pessoas) {
    if (num_pessoas == 0) return 0.0;
    int contador = 0;
    for (int i = 0; i < num_pessoas; i++) {
        if (salarios[i] < 380.00) contador++;
    }
    return (double)contador * 100.0 / num_pessoas;
}

int main() {
    double salarios[MAX_PESSOAS];
    int num_filhos[MAX_PESSOAS];
    int num_pessoas;
    ler_dados_pesquisa(salarios, num_filhos, &num_pessoas);
    if (num_pessoas > 0) {
        printf("%.2f\n", calcular_media_salario_populacao(salarios, num_pessoas));
        printf("%.2f\n", calcular_media_filhos(num_filhos, num_pessoas));
        printf("%.2f\n", encontrar_maior_salario(salarios, num_pessoas));
        printf("%.2f\n", calcular_percentual_salario_baixo(salarios, num_pessoas));
    }
    return 0;
}

```

### Exercício 21 - maior acima diagonal principal (./funcoes/21_maior_acima_diagonal_principal.c)

```c
#include <stdio.h>
#include <limits.h>

int encontrar_maior_acima_diagonal(int matriz[10][10]) {
    int maior = INT_MIN;
    int encontrou_elemento = 0;
    for (int i = 0; i < 10; i++) {
        for (int j = 0; j < 10; j++) {
            if (j > i) {
                if (!encontrou_elemento || matriz[i][j] > maior) {
                    maior = matriz[i][j];
                    encontrou_elemento = 1;
                }
            }
        }
    }
    return encontrou_elemento ? maior : INT_MIN; 
}

int main() {
    int matriz[10][10];
    for (int i = 0; i < 10; i++) {
        for (int j = 0; j < 10; j++) {
            scanf("%d", &matriz[i][j]);
        }
    }
    int maior_elemento = encontrar_maior_acima_diagonal(matriz);
    if (maior_elemento != INT_MIN) {
         printf("%d\n", maior_elemento);
    } else {
         printf("Nenhum elemento acima da diagonal principal.\n");
    }
    return 0;
}

```

### Exercício 22 - matriz soma abaixo linha seis (./funcoes/22_matriz_soma_abaixo_linha_seis.c)

```c
#include <stdio.h>

void ler_matriz_real(double matriz[10][5]) {
    for (int i = 0; i < 10; i++) {
        for (int j = 0; j < 5; j++) {
            scanf("%lf", &matriz[i][j]);
        }
    }
}

double somar_elementos_abaixo_sexta_linha(double matriz[10][5]) {
    double soma = 0.0;
    for (int i = 5; i < 10; i++) { 
        for (int j = 0; j < 5; j++) {
            soma += matriz[i][j];
        }
    }
    return soma;
}

int main() {
    double matriz[10][5];
    ler_matriz_real(matriz);
    double soma_total = somar_elementos_abaixo_sexta_linha(matriz);
    printf("%.2f\n", soma_total);
    return 0;
}

```

### Exercício 23 - tipo triangulo (./funcoes/23_tipo_triangulo.c)

```c
#include <stdio.h>
#include <stdbool.h>
#include <math.h> 

bool eh_triangulo(double a, double b, double c) {
    return (a > 0 && b > 0 && c > 0 &&
            a < b + c && b < a + c && c < a + b);
}

const char* classificar_triangulo(double a, double b, double c) {
    if (a == b && b == c) {
        return "Equilatero";
    } else if (a == b || a == c || b == c) {
        return "Isosceles";
    } else {
        return "Escaleno";
    }
}

int main() {
    double l1, l2, l3;
    scanf("%lf %lf %lf", &l1, &l2, &l3);
    if (eh_triangulo(l1, l2, l3)) {
        printf("%s\n", classificar_triangulo(l1, l2, l3));
    } else {
        printf("Nao forma triangulo\n");
    }
    return 0;
}

```

### Exercício 24 - temperaturas anuais (./funcoes/24_temperaturas_anuais.c)

```c
#include <stdio.h>
#include <float.h> 

const char* nome_do_mes(int mes_num) {
    const char* nomes[] = {"", "Janeiro", "Fevereiro", "Marco", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"};
    if (mes_num >= 1 && mes_num <= 12) return nomes[mes_num];
    return "Invalido";
}

void ler_temperaturas_mensais(double temperaturas[]) {
    for (int i = 0; i < 12; i++) {
        scanf("%lf", &temperaturas[i]);
    }
}

void mostrar_maior_temperatura_e_mes(double temperaturas[]) {
    double maior_temp = -DBL_MAX;
    int mes_maior_temp = 0;
    for (int i = 0; i < 12; i++) {
        if (temperaturas[i] > maior_temp) {
            maior_temp = temperaturas[i];
            mes_maior_temp = i + 1;
        }
    }
    printf("Maior temperatura: %.2f em %s\n", maior_temp, nome_do_mes(mes_maior_temp));
}

void mostrar_menor_temperatura_e_mes(double temperaturas[]) {
    double menor_temp = DBL_MAX;
    int mes_menor_temp = 0;
    for (int i = 0; i < 12; i++) {
        if (temperaturas[i] < menor_temp) {
            menor_temp = temperaturas[i];
            mes_menor_temp = i + 1;
        }
    }
    printf("Menor temperatura: %.2f em %s\n", menor_temp, nome_do_mes(mes_menor_temp));
}

int main() {
    double temperaturas[12];
    ler_temperaturas_mensais(temperaturas);
    mostrar_maior_temperatura_e_mes(temperaturas);
    mostrar_menor_temperatura_e_mes(temperaturas);
    return 0;
}

```

### Exercício 25 - notas alunos (./funcoes/25_notas_alunos.c)

```c
#include <stdio.h>
#define NUM_ALUNOS 10
#define NUM_AVALIACOES 4

void ler_dados_alunos(int numeros_alunos[], double notas[][NUM_AVALIACOES]) {
    for (int i = 0; i < NUM_ALUNOS; i++) {
        scanf("%d", &numeros_alunos[i]);
        for (int j = 0; j < NUM_AVALIACOES; j++) {
            scanf("%lf", &notas[i][j]);
        }
    }
}

double calcular_media_aluno(double notas_aluno[]) {
    double soma = 0.0;
    for (int i = 0; i < NUM_AVALIACOES; i++) {
        soma += notas_aluno[i];
    }
    return soma / NUM_AVALIACOES;
}

double calcular_media_geral_turma(double notas_alunos[][NUM_AVALIACOES]) {
    double soma_medias_alunos = 0.0;
    for (int i = 0; i < NUM_ALUNOS; i++) {
        soma_medias_alunos += calcular_media_aluno(notas_alunos[i]);
    }
    return soma_medias_alunos / NUM_ALUNOS;
}

void indicar_alunos_recuperacao(int numeros_alunos[], double notas_alunos[][NUM_AVALIACOES]) {
    printf("Alunos em recuperacao:\n");
    for (int i = 0; i < NUM_ALUNOS; i++) {
        if (calcular_media_aluno(notas_alunos[i]) < 6.0) {
            printf("%d\n", numeros_alunos[i]);
        }
    }
}

int main() {
    int numeros_alunos[NUM_ALUNOS];
    double notas[NUM_ALUNOS][NUM_AVALIACOES];
    ler_dados_alunos(numeros_alunos, notas);
    double media_turma = calcular_media_geral_turma(notas);
    printf("Media da turma: %.2f\n", media_turma);
    indicar_alunos_recuperacao(numeros_alunos, notas);
    return 0;
}

```

