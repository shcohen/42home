# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2018/12/21 19:08:11 by shcohen           #+#    #+#              #
#    Updated: 2019/01/04 19:56:36 by shcohen          ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

NAME = fractol
FLAGS = -Wall -Wextra -Werror

INC = includes

SRC_DIR = sources

SRC = burning_ship.c \
	draw.c \
	events.c \
	fractals.c \
	julia.c \
	main.c \
	mandelbrot.c \
	window.c

SRC := $(addprefix $(SRC_DIR)/,$(SRC))

BIN_DIR = bin
BIN = $(subst $(SRC_DIR),$(BIN_DIR),$(SRC:.c=.o))

LIBFT_DIR = libft
LIBFT = libft.a

all: $(NAME)

$(BIN_DIR)/%.o: $(SRC_DIR)/%.c
	@mkdir -p $(BIN_DIR)
	@gcc $(FLAGS) -I$(LIBFT_DIR) -I$(INC) -c $< -o $@
	@printf "\33[2K $$> %s\r" "gcc $(FLAGS) -I$(LIBFT_DIR) -I$(INC) -c $< -o $@"

$(LIBFT_DIR)/$(LIBFT):
	@$(MAKE) -C $(LIBFT_DIR) all

$(NAME): $(LIBFT_DIR)/$(LIBFT) $(BIN)
	@gcc $(LIBFT_DIR)/$(LIBFT) -lmlx -framework OpenGL -framework AppKit $(BIN) -o $(NAME)
	@printf "\33[2K\r\e[96mFractol \e[90m[\e[32mOK\e[90m]\e[0m\n"

clean:
	@rm -rf $(BIN_DIR)
	@$(MAKE) -C $(LIBFT_DIR) clean
fclean: clean
	@rm -f $(NAME)
	@$(MAKE) -C $(LIBFT_DIR) fclean
re: fclean all

.PHONY : re all clean fclean
