/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_memchr.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/17 17:18:04 by shcohen           #+#    #+#             */
/*   Updated: 2018/05/23 18:10:11 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

void	*ft_memchr(const void *s, int c, size_t len)
{
	unsigned int	i;
	unsigned char	*sptr;

	sptr = (unsigned char*)s;
	i = 0;
	while (len > i)
	{
		if (sptr[i] == (unsigned char)c)
			return (&sptr[i]);
		i++;
	}
	return (NULL);
}
