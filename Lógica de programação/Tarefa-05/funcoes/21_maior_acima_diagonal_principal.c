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
