/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_open_read_close.c                               :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/13 17:43:26 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/18 19:14:50 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "include/fillit.h"

int	ft_openfile(char* argv, t_var *var)
{
	int			fd;

	fd = open (argv, O_RDONLY); // = index sur fichier a ouvrir (3)
	if (fd == -1)
		ft_error(1, var);
	puts("file opened.");
	return (fd);
}

void ft_readfile(int fd, t_var *var)
{
	int 		size;

	if (!(var->str.buf = (char *)malloc(sizeof(char) * BUF_SIZE + 1)))
		ft_error(2, var);
	size = read (fd, var->str.buf, BUF_SIZE);
	var->str.buf[size] = '\0';
	if (size == -1)
		ft_error(2, var);
	puts("\nfile read.");
}

void	ft_closefile(int fd, t_var *var)
{
	if (close(fd) == -1)
		ft_error(3, var);
	puts("\nfile closed.");
}