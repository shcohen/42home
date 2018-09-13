/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_open_read_close.c                               :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/13 17:43:26 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/13 17:44:01 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "fillit.h"

int	ft_openfile (char* argv)
{
	int	fd;

	fd = open (argv, O_RDONLY);
	if (fd == -1)
		ft_error(1);
	return(fd);
}

char *ft_readfile (int fd)
{
	int size;
	char *buf;

	if (!(buf = (char *)malloc(sizeof(char) * BUF_SIZE + 1)))
		return (0);
	size = read (fd, buf, BUF_SIZE);
	buf[size] = '\0';
	if (size == -1)
		ft_error(2);
	return (buf);
}

int	ft_closefile (int fd)
{
	if (close(fd) == -1)
		ft_error(3);
	// puts("\nclosed.");
	return (0);
}