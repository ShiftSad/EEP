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
