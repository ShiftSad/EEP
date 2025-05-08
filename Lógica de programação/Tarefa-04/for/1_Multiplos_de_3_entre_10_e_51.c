#include <stdio.h>

int main() {
    for (int i = 10; i <= 51; i++) {
        if (i % 3 == 0) {
            printf("%d é um múltiplo de 3\n", i);
        }
    }
}