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
