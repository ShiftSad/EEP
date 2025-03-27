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
        // If it's the last row, use one less space
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