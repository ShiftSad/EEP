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
