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
