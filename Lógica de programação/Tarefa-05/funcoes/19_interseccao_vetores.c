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
